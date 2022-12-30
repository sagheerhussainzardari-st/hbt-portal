<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <h1>This is your portal for admin</h1>
    </AuthenticatedLayout>
</template>
