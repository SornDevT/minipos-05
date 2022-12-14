import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import Cleave from 'vue-cleave-component';
import Pagination from './components/Pagination.vue';
import DashGrap from './components/DashGrap.vue';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import Vue3Storage from "vue3-storage";

require('./bootstrap');

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(VueSweetalert2);
app.use(router);
app.use(Cleave);
app.component('pagination',Pagination);
app.component('DashGrap',DashGrap);
app.use(Vue3Storage, { namespace: "pro_" });
app.mount("#app-vue");
