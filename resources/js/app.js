require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import {createApp} from "vue";
import router from "./routes";
import JobsIndex from "./components/jobs/JobsIndex.vue";


createApp({
    components:{
        JobsIndex
    }
}).use(router).mount('#app');
