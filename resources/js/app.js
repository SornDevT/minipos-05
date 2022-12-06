import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

require('./bootstrap');

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(VueSweetalert2);
app.use(router);
app.mount("#app-vue");
