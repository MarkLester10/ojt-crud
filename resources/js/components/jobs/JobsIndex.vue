<template>
        <div class="flex flex-col md:flex-row items-center justify-between mb-4 space-y-2 md:space-y-0">
            <div class="md:px-4 md:py-2 flex-1 w-full">

           <div class="w-full flex flex-col md:flex-row items-center md:space-x-4">
                <input type="text" name="search"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="filters.search" placeholder="Search job, title, description, company">

                <select name="category" v-model="filters.status" id="category" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value='desc'>Latest</option>
                        <option value='asc'>Old</option>
                    </select>

                <select name="category" v-model="filters.category" id="category" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value=''>All Categories</option>
                       <option value=1>Construction</option>
                        <option value=2>Chemical</option>
                        <option value=3>Petroleum</option>
                        <option value=4>Software</option>
                        <option value=5>Automotive</option>
                        <option value=6>Entertainment</option>
                    </select>
                <select name="perPage" v-model="filters.perPage" id="perPage" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value=5>5</option>
                       <option value=10>10</option>
                        <option value=20>20</option>
                        <option value=30>30</option>
                        <option value=40>40</option>
                        <option value=50>50</option>
                        <option value=60>60</option>
                        <option value=70>70</option>
                        <option value=80>80</option>
                        <option value=90>90</option>
                        <option value=100>100</option>
                    </select>
           </div>
            </div>
            <div class="w-full md:w-auto px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer text-center rounded-md">
                <router-link :to="{ name: 'jobs.create' }" class="text-sm font-medium">Create Job</router-link>
            </div>
        </div>
     <div class="overflow-hidden overflow-x-auto w-full align-middle sm:rounded-md">
        <table class="w-full border divide-y divide-gray-200">
            <thead>
            <tr class="whitespace-no-wrap">
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase whitespace-no-wrap">ID</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase whitespace-no-wrap">Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase whitespace-no-wrap">Company / Description</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase whitespace-no-wrap">Category</span>
                </th>

                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase whitespace-no-wrap">Date Created</span>
                </th>

                <th class="px-6 py-3 bg-gray-50">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-if="jobs.length < 1">
                  <tr class="bg-white">
                    <td colspan="100%" class="px-6 py-4 text-center text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        No Data Found
                    </td>
                    </tr>
            </template>
            <template v-for="job in jobs" :key="job.id" v-else>

                <tr class="bg-white whitespace-no-wrap">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.id }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ job.title }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
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
import {onMounted, reactive, watch} from "vue";
import Swal from 'sweetalert2';

export default {
    setup(){
        const {jobs, getJobs, destroyJob, jobsPaginationLinks} = useJobs();

        const filters = reactive({
            'search':'',
            'status':'desc',
            'category':'',
            'perPage':5,
        })

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
                     getJobs(1,{...filters});
                    Swal.fire('Job Deleted Successfully!', '', 'success')
                }
            })
        }

        onMounted(getJobs(1, {...filters}));

        watch(filters,
            (filters) => {
                getJobs(1, {...filters});
            }
        );

        return{
            jobs,
            jobsPaginationLinks,
            deleteJob,
            getJobs,
            filters
        }
    }
}
</script>

<style>
    ul.pagination{
        display: flex;
        border: none !important;
    }
    .sr-only{
        display: none !important;
    }

    ul.pagination, .page-item{
        padding:10px;
         cursor: pointer;

    }
    .pagination-page-nav.active{
        background-color: #0074f2;
        color: #fff;
    }

    .pagination-page-nav{
         background-color: #faf9fc;
    }
    .pagination-page-nav:hover{
         background-color: #dcdbdf;
    }

</style>
