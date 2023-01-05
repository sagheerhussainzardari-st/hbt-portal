<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

const props = defineProps({
    role: String,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :role="role">
        <div class="grid-cols-3 grid gap-2 w-10/12 mx-auto ">
            <div class="bg-green-600 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white">Teachers</h1>
                <h1 class="text-right font-bold text-4xl text-white">100</h1>
            </div>
            <div class="bg-red-600 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white">Students</h1>
                <h1 class="text-right font-bold text-4xl text-white">4000</h1>
            </div>
            <div class="bg-yellow-500 p-4 m-4 rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <h1 class="font-bold text-2xl text-white">Teachers</h1>
                <h1 class="text-right font-bold text-4xl text-white">100</h1>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
