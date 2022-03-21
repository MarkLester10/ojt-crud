require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import {createApp} from "vue";
import router from "./routes";
import JobsIndex from "./components/jobs/JobsIndex.vue";
import LaravelVuePagination from 'laravel-vue-pagination';


const app = createApp({});
app.component('JobsIndex', JobsIndex)
    .component('Pagination',LaravelVuePagination)
    .use(router)
    .mount('#app');

