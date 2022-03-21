import {createRouter, createWebHistory} from "vue-router";

import JobsIndex from '../components/jobs/JobsIndex.vue';
import JobsCreate from '../components/jobs/JobsCreate.vue';
import JobsEdit from '../components/jobs/JobsEdit.vue';

const routes = [
    {
        path: '/dashboard',
        name: 'jobs.index',
        component: JobsIndex
    },
    {
        path: '/jobs/create',
        name: 'jobs.create',
        component: JobsCreate
    },
    {
        path: '/jobs/:id/edit',
        name: 'jobs.edit',
        component: JobsEdit,
        props:true,
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
});
