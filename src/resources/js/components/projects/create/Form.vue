<template>
    <v-form method="POST" :action="action" class="pt-4">
        <v-text-field
            :value="title"
            outlined
            label="Title"
            dense
            name="title"
            :error-messages="errors.title"
        />
        <v-textarea
            :value="description"
            outlined
            label="Description"
            name="description"
            :error-messages="errors.description"
        />
        <v-btn color="primary" type="submit">
            Create Project
        </v-btn>
        <input type="hidden" name="_token" :value="csrf" />
    </v-form>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: ""
        },
        description: {
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
        console.log(this.errors);
    }
};
</script>
