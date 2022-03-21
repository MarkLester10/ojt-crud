<template>
     <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link :to="{ name: 'jobs.create' }" class="text-sm font-medium">Create Job</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">No</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Company / Description</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Category</span>
                </th>

                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Date Created</span>
                </th>

                <th class="px-6 py-3 bg-gray-50">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-if="!jobs">
                  <tr class="bg-white">
                    <td colspan="100%" class="px-6 py-4 text-center text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        No Data Found
                    </td>
                    </tr>
            </template>
            <template v-for="job in jobs" :key="job.id" v-else>

                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.id }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.title }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 !whitespace-no-wrap">
                        <strong>{{ job.company }}</strong> <br>
                        {{ job.description }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.category_name }}
                    </td>

                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.created_at }}
                    </td>

                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap flex items-center justify-center space-x-4">
                        <router-link :to="{name:'jobs.edit', params:{id:job.id}}">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </router-link>
                        <button @click="deleteJob(job.id)">
                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </td>
                </tr>
            </template>
            <pagination :data="jobsPaginationLinks" @pagination-change-page="getJobs"></pagination>
            </tbody>
        </table>
    </div>
</template>

<script>
import useJobs from "../../composables/jobs";
import {onMounted, ref } from "vue";
import Swal from 'sweetalert2';

export default {
    setup(){
        const {jobs, getJobs, destroyJob, jobsPaginationLinks} = useJobs();

        const deleteJob = (id)=>{
            Swal.fire({
            title: 'Are you sure you want to delete this job?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No',
            customClass: {
                actions: 'my-actions',
                confirmButton: 'order-2',
                denyButton: 'order-3',
            }
                }).then((result) => {
                if (result.isConfirmed) {
                     destroyJob(id);
                     getJobs();
                    Swal.fire('Job Deleted Successfully!', '', 'success')
                }
            })
        }


        onMounted(getJobs);
        return{
            jobs,
            jobsPaginationLinks,
            deleteJob,
            getJobs
        }
    }
}
</script>

<style>
    ul.pagination{
        display: flex;
        border: none !important;
    }
    /* .sr-only{
        display: none !important;
    } */

    ul.pagination, .page-item{
        padding:10px;
        /* border: .3px solid rgb(180, 180, 180); */
    }
    .pagination-page-nav.active{
        background-color: #0074f2;
        color: #fff;
    }

</style>
