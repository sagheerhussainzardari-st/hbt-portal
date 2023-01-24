<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';


const props = defineProps({
    role: String
});
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout :role="role">
        <div class="grid-cols-1 grid gap-2 md:grid-cols-2 lg:grid-cols-4 lg:w-9/12 mx-auto ">
           
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
            <Link  class="bg-white   m-4 shadow hover:shadow-green-200 text-center rounded shadow-md transition-all hover:scale-105 duration-300 cursor-pointer">
                <img src="https://picsum.photos/200/300" class="w-full h-40" alt="" srcset="">
                <h1 class="p-2">Video 1</h1>
            </Link>
           
           
        </div>
    </AuthenticatedLayout>
</template>
