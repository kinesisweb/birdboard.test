import Vue from "vue";
import Vuetify, {
    VAlert,
    VApp,
    VAppBar,
    VBtn,
    VCard,
    VCardSubtitle,
    VCardText,
    VCardTitle,
    VCol,
    VContainer,
    VMain,
    VIcon,
    VList,
    VListItem,
    VListItemTitle,
    VMenu,
    VRow,
    VTextarea,
    VSpacer,
    VToolbar,
    VToolbarTitle
} from "vuetify/lib";
import { Ripple } from "vuetify/lib/directives";

Vue.use(Vuetify, {
    components: {
        VAlert,
        VApp,
        VAppBar,
        VBtn,
        VCard,
        VCardSubtitle,
        VCardText,
        VCardTitle,
        VCol,
        VContainer,
        VMain,
        VIcon,
        VList,
        VListItem,
        VListItemTitle,
        VMenu,
        VRow,
        VSpacer,
        VTextarea,
        VToolbar,
        VToolbarTitle
    },
    directives: {
        Ripple
    }
});

const options = {
    theme: {
        options: {
            customProperties: true
        },
        themes: {
            light: {
                primary: "#47D5Fa"
            }
        }
    }
};

export default new Vuetify(options);
