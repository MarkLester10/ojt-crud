<template>
    <form class="space-y-6" @submit.prevent="saveJob">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['title']}">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" id="title"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :class="{'border-red-500 border-2':errors['title']}"
                           v-model="form.title">
                           <small class="text-red-500" v-if="errors['title']">
                               {{ errors['title'][0] }}
                           </small>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['description']}">Description</label>
                <div class="mt-1">
                    <textarea type="text" name="description" id="description" :class="{'border-red-500 border-2':errors['description']}"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.description"></textarea>
                             <small class="text-red-500" v-if="errors['description']">
                               {{ errors['description'][0] }}
                           </small>
                </div>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['category']}">Category</label>
                <div class="mt-1">
                    <select name="category" v-model="form.category" id="category" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :class="{'border-red-500 border-2':errors['category']}">
                        <option value=''>--select an option---</option>
                        <option value=1>Construction</option>
                        <option value=2>Chemical</option>
                        <option value=3>Petroleum</option>
                        <option value=4>Software</option>
                        <option value=5>Automotive</option>
                        <option value=6>Entertainment</option>
                    </select>
                           <small class="text-red-500" v-if="errors['category']">
                               {{ errors['category'][0] }}
                           </small>
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['email']}">Email</label>
                <div class="mt-1">
                    <input type="email" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           :class="{'border-red-500 border-2':errors['email']}"
                           v-model="form.email">
                            <small class="text-red-500" v-if="errors['email']">
                               {{ errors['email'][0] }}
                           </small>
                </div>
            </div>
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['company']}">Company</label>
                <div class="mt-1">
                    <input type="text" name="company" id="company"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :class="{'border-red-500 border-2':errors['company']}"
                           v-model="form.company">
                            <small class="text-red-500" v-if="errors['company']">
                               {{ errors['company'][0] }}
                           </small>
                </div>
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['address']}">Address</label>
                <div class="mt-1">
                    <input type="text" name="address" id="address"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :class="{'border-red-500 border-2':errors['address']}"
                            v-model="form.address">
                            <small class="text-red-500" v-if="errors['address']">
                               {{ errors['address'][0] }}
                           </small>
                </div>
            </div>
            <div>
                <label for="website" class="block text-sm font-medium text-gray-700" :class="{'text-red-500':errors['website']}">Website</label>
                <div class="mt-1">
                    <input type="text" name="website" id="website"
                            :class="{'border-red-500 border-2':errors['website']}"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.website">
                            <small class="text-red-500" v-if="errors['website']">
                               {{ errors['website'][0] }}
                           </small>
                </div>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>

<script>
import {reactive} from "vue";
import useJobs from "../../composables/jobs";
export default {
    setup(){
        const {errors, storeJob} = useJobs();
        const form = reactive({
            'title':'',
            'description':'',
            'category':'',
            'email':'',
            'company':'',
            'address':'',
            'website':'',
        })

        const saveJob = async ()=>{
            await storeJob({...form});
        }

        return{
            form,
            errors,
            saveJob
        }
    }
}
</script>

<style>

</style>
