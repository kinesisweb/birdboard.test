import Vue from "vue";
import Vuetify, {
    VAlert,
    VApp,
    VAppBar,
    VBtn,
    VCard,
    VCardActions,
    VCardSubtitle,
    VCardText,
    VCardTitle,
    VCheckbox,
    VCol,
    VContainer,
    VForm,
    VMain,
    VIcon,
    VList,
    VListItem,
    VListItemTitle,
    VMenu,
    VRow,
    VSpacer,
    VSubheader,
    VTextarea,
    VTextField,
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
        VCardActions,
        VCardSubtitle,
        VCardText,
        VCardTitle,
        VCheckbox,
        VCol,
        VContainer,
        VForm,
        VMain,
        VIcon,
        VList,
        VListItem,
        VListItemTitle,
        VMenu,
        VRow,
        VSpacer,
        VSubheader,
        VTextarea,
        VTextField,
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
