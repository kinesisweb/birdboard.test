import vuetify from "./plugins/vuetify";
import Vue from "vue";

import BbLogo from "./components/svg/Logo";
Vue.component("bb-create-project-form", () =>
    import(
        /* webpackChunkName: "js/create-project-form" */
        "./components/projects/create/Form"
    )
);
Vue.component("bb-add-project-task-form", () =>
    import(
        /* webpackChunkName: "js/add-task-form" */
        "./components/projects/add_task/Form"
    )
);
Vue.component("bb-logo", BbLogo);

const app = new Vue({
    vuetify
}).$mount("#app");
