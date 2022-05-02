<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chair from '@/Components/Chair.vue';

defineProps({
    chairs: Array
})
</script>

<template>
    <div class="mt-6 flex flex-col sm:justify-center items-center overflow-auto">
        <div class="w-[95%] h-5/6 min-w-[1400px] min-h-[720px] bg-black grid gap-2" style="grid-template-columns: repeat(45, 1fr); grid-template-rows: repeat(26, 1fr)">
            <Chair v-for="chair of chairs" :key="chair.id" :chair="chair" />
        </div>
    </div>
</template>
