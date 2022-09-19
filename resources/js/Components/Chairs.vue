<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chair from '@/Components/Chair.vue';

defineProps({
    chairs: Array,
    selectEnabled: Boolean
})
</script>

<template>
    <div class="mt-6 flex flex-col sm:justify-center items-center overflow-auto">
        <div
            :class="{ 'relative': !selectEnabled }"
            class="w-full h-screen min-w-[1400px] min-h-[720px] grid gap-1"
            style="grid-template-columns: repeat(192, 1fr); grid-template-rows: repeat(101, 1fr); background: #9195ac;"
        >
            <Chair
                v-for="chair of chairs"
                :key="chair.id"
                :chair="chair"
                @toggle-selected="toggleSelected"
            />
            <div v-if="!selectEnabled" class="absolute top-0 left-0 w-full h-full"></div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        toggleSelected ({ id }) {
            this.$emit('toggle-selected', { id });
        }
    }
};
</script>
