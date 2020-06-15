<template>
    <v-form method="POST" :action="path" ref="form" :name="'update-task-' + id">
        <input type="hidden" name="_method" value="PATCH" />
        <input type="hidden" name="_token" :value="csrf" />
        <v-row>
            <v-col class="py-0">
                <v-text-field
                    :readonly="completedIsChecked"
                    :value="body"
                    dense
                    :color="completedIsChecked ? 'secondary' : ''"
                    name="body"
                    placeholder="Task"
                    :error-messages="error"
                    :hint="hint"
                />
            </v-col>
            <v-col cols="auto" class="py-0">
                <v-checkbox
                    class="ma-0"
                    dense
                    hide-details
                    name="completed"
                    color="success"
                    :value="true"
                    v-model="completedIsChecked"
                    @change="updateTask"
                ></v-checkbox>
            </v-col>
        </v-row>
    </v-form>
</template>

<script>
export default {
    props: {
        completed: {
            type: Boolean,
            default: false
        },
        body: {
            type: String,
            default: ""
        },
        csrf: {
            type: String,
            required: true
        },
        path: {
            type: String,
            required: true
        },
        id: {
            type: Number,
            required: true
        },
        error: {
            type: String,
            default: null
        }
    },
    methods: {
        updateTask() {
            this.$nextTick(() => {
                console.log(
                    new URLSearchParams(
                        new FormData(this.$refs.form.$el)
                    ).toString()
                );

                this.$refs.form.$el.submit();
            });
        }
    },
    data() {
        return {
            completedIsChecked: this.completed
        };
    },
    computed: {
        hint() {
            return this.completedIsChecked
                ? "Cannot edit completed task!"
                : "Press Enter to update task";
        }
    }
};
</script>
