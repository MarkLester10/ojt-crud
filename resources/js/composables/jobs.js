import axios from 'axios';
import {ref} from 'vue';
import { useRouter } from 'vue-router';
import Swal from 'sweetalert2';


export default function useJobs() {

    const jobsPaginationLinks = ref([]);
    const jobs = ref([]);
    const job = ref([]);
    const errors = ref([]);
    const router = useRouter();

    // Get Jobs with optional filters
    const getJobs = async (page = 1, filters = {'search':' ','status':'desc', 'category':'','perPage':5,}) => {
        let res = await axios.get(`/api/jobs?page=${page}&search=${filters.search}&status=${filters.status}&category=${filters.category}&perPage=${filters.perPage}`)
        jobs.value = res.data.data;
        jobsPaginationLinks.value = res.data;
    }

    // Get single Job
    const getJob = async (id) => {
        let res = await axios.get(`/api/jobs/${id}`)
        job.value = res.data.data;
    }

    // Delete Job
    const destroyJob = async (id) => {
       await axios.delete(`/api/jobs/${id}`);
    }

    // Store Job
    const storeJob = async (data) => {
       try{
        await axios.post('/api/jobs/', data);
        await router.push({name:'jobs.index'});
        await Swal.fire('New Job has been created!','','success')
       }catch(e){
        console.log(e.response.data.errors);
           if(e.response.status === 422){
            errors.value = e.response.data.errors
        }
       }
    }

    // Update job
    const updateJob = async (id) => {
       try{
        await axios.put(`/api/jobs/${id}`, job.value);
        await router.push({name:'jobs.index'});
        await Swal.fire('Job has been updated!','','success')
       }catch(e){
        console.log(e.response.data.errors);
           if(e.response.status === 422){
            errors.value = e.response.data.errors
        }
       }
    }


    return{
        jobs,
        job,
        getJobs,
        getJob,
        destroyJob,
        storeJob,
        errors,
        updateJob,
        jobsPaginationLinks
    }
}
