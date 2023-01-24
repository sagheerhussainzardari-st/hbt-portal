<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import DropdownHeadless from '@/Components/DropdownHeadless.vue'
import StudentAddModalHeadless from '@/Components/StudentAddModalHeadless.vue'
import StudentEditModalHeadless from '@/Components/StudentEditModalHeadless.vue'
import StudentViewModalHeadless from '@/Components/StudentViewModalHeadless.vue'

import { onMounted,reactive } from 'vue';
import axios from 'axios';

const props = defineProps({
    courses: Array,
    shifts: Array,
    students: Array,
    role: String,
});

const reactiveValues = reactive({
    searchValue: '',
})

const getCourseName = (course_id) =>{
    return props.courses.find(course => course.id === course_id).name;
}
const getShiftName = (shift_id) =>{
    return props.shifts.find(shift => shift.id === shift_id).name;
}

const deleteStudent = (student_id) =>{
    axios.post('students/delete/'+student_id);
    window.location.reload();
}

const getFilteredData = () =>{
    return props.students.filter(student => getCourseName(student.course_id).toLowerCase().includes(reactiveValues.searchValue.toLowerCase()) || student.name.toLowerCase().includes(reactiveValues.searchValue.toLowerCase()) || student.cnic.toLowerCase().includes(reactiveValues.searchValue.toLowerCase()) || student.age == reactiveValues.searchValue || student.gender.toLowerCase().includes(reactiveValues.searchValue.toLowerCase()));
}

</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout :role="role" >
        <div class="bg-white m-4   h-full p-6 rounded shadow ">
            <div class="flex justify-between items-center border-2 p-2 rounded-t">
                <h1 class="text-xl font-bold">Students ({{getFilteredData().length || 0}})</h1>
                <input v-model="reactiveValues.searchValue" type="text" class="w-6/12 rounded-full focus:ring-none outline-none" placeholder="Search...">
                <StudentAddModalHeadless v-if="role == 'admin'" :courses="props.courses" :shifts="props.shifts" />
            </div>
            
            <div class="">
                <table class="w-full border table">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="p-2">#</th>
                            <th class="p-2">Name</th>
                            <th class="p-2">Father Name</th>
                            <th class="p-2">Course</th>
                            <th class="p-2">CNIC</th>
                            <th class="p-2">Phone</th>
                            <th class="p-2">Shift</th>
                            <th class="p-2">Age</th>
                            <th class="p-2">Gender</th>
                            <th v-if="role == 'admin'" class="p-2 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr v-for="(student,index) in getFilteredData()" class="odd:bg-gray-100 hover:odd:bg-gray-200 hover:even:bg-gray-200 transition duration-300 ">
                            <td class="p-2 ">{{index+1}}</td>
                            <td class="p-2 ">
                                <!-- student.name -->
                                <StudentViewModalHeadless :courses="props.courses" :shifts="props.shifts" :student="student" /></td>
                            <td class="p-2 ">{{student.father_name}}</td>
                            <td class="p-2 ">{{getCourseName(student.course_id) }}</td>
                            <td class="p-2 ">{{student.cnic }}</td>
                            <td class="p-2 ">{{student.phone }}</td>
                            <td class="p-2 ">{{getShiftName(student.shift_id) }}</td>
                            <td class="p-2 ">{{student.age }}</td>
                            <td class="p-2 ">{{student.gender }}</td>
                            <td v-if="role == 'admin'" class="p-2  text-center flex gap-2 ">
                                <StudentEditModalHeadless :courses="props.courses" :student="student" :shifts="props.shifts" />
                                 <button class="rounded-md bg-black  px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75" @click="deleteStudent(student.id)">Delete</button></td>
                        </tr>
                        <tr v-if="getFilteredData().length < 1" class="">
                            <td class="p-2">No Records Found...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        
    </AuthenticatedLayout>
</template>
