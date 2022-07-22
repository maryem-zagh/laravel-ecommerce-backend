import {
    createApp
} from "vue";
import {
    createPinia
} from "pinia";
import {
    createI18n
} from 'vue-i18n'
import messages from './lang'
// const messages = {
//     'en': {
//         welcomeMsg: 'Trouvez les meilleurs projets digitals'
//     },
//     'es': {
//         welcomeMsg: 'Find the best digital projects'
//     }
// };
const i18n = createI18n({
    // something vue-i18n options here ...
    locale: 'en', // set locale
    fallbackLocale: 'es', // set fallback locale
    messages, // set locale messages
})
import App from "./App.vue";
import router from "./router";
// Tailwindcss
import './index.css'
// modal
// axios
import Axios from 'axios'
import clickOutside from "vue3-clickoutside-component";



Axios.defaults.baseURL = 'https://feelnfill-admin.tundev.tn/api';
// Axios.defaults.baseURL = 'http://localhost:8000/api';
// Axios.defaults.headers.common['Access-Control-Allow-Origin'] = 'https://www.feelnfill-preprod.tundev.tn/'

import {
    library
} from "@fortawesome/fontawesome-svg-core";
import {
    faPhone,
    faBars,
    faSearch,
    faShoppingBag,
    faGreaterThan,
    faPlus,
    faCheck

} from "@fortawesome/free-solid-svg-icons";

library.add(faPhone, faBars, faSearch, faShoppingBag, faGreaterThan, faPlus, faCheck);

import {
    FontAwesomeIcon
} from "@fortawesome/vue-fontawesome";

if (typeof window !== 'undefined') {
    console.log('You are on the browser')
    // 👉️ can use localStorage here
} else {
    console.log('You are on the server')
    // 👉️ can't use localStorage
}
const app = createApp(App);
app.config.globalProperties.$http = Axios;
// config fontawesome
app.component("font-awesome-icon", FontAwesomeIcon)
// 
app.use(i18n)
app.use(createPinia());
app.use(router);
app.use(clickOutside);
app.mount("#app");