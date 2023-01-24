<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    role: String,
    total_teachers: Number,
    total_students: Number,
    total_courses: Number
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :role="role">
        <div class="grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid gap-2 lg:w-10/12 mx-auto ">
            <Link href="/admin/teachers" class="bg-green-600 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white py-2">Teachers</h1>
                <h1 class="text-right font-bold text-4xl text-white py-4">{{total_teachers}}</h1>
            </Link>
            <Link href="/admin/students" class="bg-blue-600 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white py-2">Students</h1>
                <h1 class="text-right font-bold text-4xl text-white py-4">{{total_students}}</h1>
            </Link>
            <Link href="/" class="bg-red-600 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white py-2">Courses</h1>
                <h1 class="text-right font-bold text-4xl text-white py-4">{{total_courses}}</h1>
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
