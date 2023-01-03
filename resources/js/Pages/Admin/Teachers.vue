<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import DropdownHeadless from '@/Components/DropdownHeadless.vue'
import TeacherAddModalHeadless from '@/Components/TeacherAddModalHeadless.vue'
import { onMounted } from 'vue';

const props = defineProps({
    courses: Array,
    teachers: Array
});

const getCourseName = (course_id) =>{
    return props.courses.find(course => course.id === course_id).name;
}

</script>

<template>
    <Head title="Teachers" />

    <AuthenticatedLayout>
        <div class="bg-white m-4   h-full p-6 rounded shadow ">
            <div class="flex justify-between items-center border-2 p-2 rounded-t">
                <h1 class="text-xl font-bold">Teachers ({{teachers.length || 0}})</h1>
                <TeacherAddModalHeadless :courses="props.courses" />
            </div>
            <div class="">
                <table class="w-full border table">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="p-2">#</th>
                            <th class="p-2">Name</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">About</th>
                            <th class="p-2">Course</th>
                            <th class="p-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr v-for="teacher in teachers" class="odd:bg-gray-100 hover:odd:bg-gray-200 hover:even:bg-gray-200 transition duration-300 ">
                            <td class="p-2 ">{{teacher.id}}</td>
                            <td class="p-2 ">{{teacher.name}}</td>
                            <td class="p-2 ">{{teacher.email}}</td>
                            <td class="p-2 ">{{teacher.about}}</td>
                            <td class="p-2 ">{{getCourseName(teacher.course_id) }}</td>
                            <td class="p-2  text-center "><DropdownHeadless /></td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
            
        </div>

        
    </AuthenticatedLayout>
</template>
