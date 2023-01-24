<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import DropdownHeadless from '@/Components/DropdownHeadless.vue'
import TeacherAddModalHeadless from '@/Components/TeacherAddModalHeadless.vue'
import TeacherEditModalHeadless from '@/Components/TeacherEditModalHeadless.vue'
import TeacherViewModalHeadless from '@/Components/TeacherViewModalHeadless.vue'

import { onMounted ,reactive} from 'vue';
import axios from 'axios';

const props = defineProps({
    courses: Array,
    teachers: Array,
    role: String
});

const reactiveValues = reactive({
    searchValue: '',
})

const getCourseName = (course_id) =>{
    return props.courses.find(course => course.id === course_id).name;
}

const deleteTeacher = (teacher_id) =>{
    axios.post('teachers/delete/'+teacher_id);
  window.location.reload();
}

const getFilteredData = () =>{
    return props.teachers.filter(teacher => teacher.name.toLowerCase().includes(reactiveValues.searchValue.toLowerCase()));
}

</script>

<template>
    <Head title="Teachers" />

    <AuthenticatedLayout :role="role">
        <div class="bg-white m-4   h-full p-6 rounded shadow ">
            <div class="lg:flex justify-between items-center border-2 p-2 rounded-t">
                <h1 class="text-xl text-center lg:text-left font-bold">Teachers ({{teachers.length || 0}})</h1>
                <input v-model="reactiveValues.searchValue" type="text" class="lg:w-6/12 w-full rounded-full focus:ring-none outline-none" placeholder="Search..." >
                <TeacherAddModalHeadless :courses="props.courses" />
            </div>
            
            <div class="overflow-y-auto">
                <table class="w-full border table">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="p-2">#</th>
                            <th class="p-2">Name</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">About</th>
                            <th class="p-2">Course</th>
                            <th class="p-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr v-for="(teacher,index) in getFilteredData()" class="odd:bg-gray-100 hover:odd:bg-gray-200 hover:even:bg-gray-200 transition duration-300 ">
                            <td class="p-2 ">{{index+1}}</td>
                            <td class="p-2 "><TeacherViewModalHeadless :courses="props.courses" :teacher="teacher" /></td>
                            <td class="p-2 ">{{teacher.email}}</td>
                            <td class="p-2 ">{{teacher.about}}</td>
                            <td class="p-2 ">{{getCourseName(teacher.course_id) }}</td>
                            <td class="p-2  text-center flex gap-2 "><TeacherEditModalHeadless :courses="props.courses" :teacher="teacher" /> <button class="rounded-md bg-black  px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75" @click="deleteTeacher(teacher.id)">Delete</button></td>
                        </tr>
                        <tr v-if="teachers.length < 1" class="">
                            <td class="p-2">No Records Found...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        
    </AuthenticatedLayout>
</template>
