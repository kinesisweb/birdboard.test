<template>
    <v-col cols="12">
        <v-text-field
            :id="name1"
            :name="name1"
            :label="label1"
            outlined
            prepend-inner-icon="mdi-lock"
            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show = !show"
            :type="show ? 'text' : 'password'"
            v-model="pass1"
            @blur="checkMatch"
        />
        <v-text-field
            :id="name2"
            :name="name2"
            :label="label2"
            outlined
            prepend-inner-icon="mdi-lock-check"
            :error-messages="errorMessage"
            :append-icon="showConfirm ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="showConfirm = !showConfirm"
            :type="showConfirm ? 'text' : 'password'"
            v-model="pass2"
            @blur="checkMatch"
        />
    </v-col>
</template>

<script>
export default {
    props: {
        name1: {
            type: String,
            default: "password"
        },
        name2: {
            type: String,
            default: "password_confirmation"
        },
        error: {
            type: String,
            default: null
        },
        label1: {
            type: String,
            default: "Password"
        },
        label2: {
            type: String,
            default: "Confirm Password"
        }
    },
    data() {
        return {
            show: false,
            showConfirm: false,
            pass1: "",
            pass2: "",
            isMatch: true
        };
    },
    computed: {
        errorMessage() {
            if (this.error) return this.error;
            else if (this.isMatch === false) return "Passwords do not match!";
            else return "";
        }
    },
    methods: {
        checkMatch() {
            if (this.pass1 === "" || this.pass2 === "") this.isMatch = true;
            else if (this.pass1 !== this.pass2) this.isMatch = false;
            else this.isMatch = true;
        }
    }
};
</script>
