<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chairs from '@/Components/Chairs.vue';

defineProps({
    chairs: Array
})


</script>

<template>
    <div class="min-h-screen bg-slate-900">
        <Navbar />
        <form @submit="submit">
            <Chairs :chairs="chairs" />
        </form>
    </div>
</template>
