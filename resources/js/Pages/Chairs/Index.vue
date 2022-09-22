<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Chairs from '@/Components/Chairs.vue';
import Navbar from '@/Components/Navbar.vue';

defineProps({ chairs: Array })
</script>

<template>
    <Head title="Sillas vendidas" />

    <div class="min-h-screen bg-slate-900">
        <Navbar />

        <Chairs :chairs="chairs" :select-enabled="false" />
    </div>
</template>
