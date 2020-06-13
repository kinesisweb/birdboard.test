<template>
    <v-form method="POST" :action="action">
        <v-row>
            <v-col>
                <v-text-field
                    :value="body"
                    outlined
                    label="Add a Task"
                    dense
                    name="body"
                    :error-messages="errors.body"
                    :hide-details="!errors.body"
                />
            </v-col>
            <v-col cols="auto">
                <v-btn color="secondary" type="submit">
                    Add Task
                </v-btn>
            </v-col>
        </v-row>
        <input type="hidden" name="_token" :value="csrf" />
    </v-form>
</template>

<script>
export default {
    props: {
        body: {
            type: String,
            default: ""
        },
        action: {
            type: String,
            required: true
        },
        csrf: {
            type: String,
            required: true
        },
        errorsRaw: {
            type: String
        }
    },
    data() {
        return {
            errors: []
        };
    },
    mounted() {
        this.errors = JSON.parse(this.errorsRaw);
    }
};
</script>
