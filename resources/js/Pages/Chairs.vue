<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
</script>

<template>
    <div class="min-h-screen bg-slate-900">
        <Navbar />

        <div class="mt-6 flex flex-col sm:justify-center items-center overflow-auto">
            <div class="w-[95%] h-5/6 min-w-[1400px] min-h-[720px] bg-black grid gap-2" style="grid-template-columns: repeat(45, 1fr); grid-template-rows: repeat(26, 1fr)">
                <div class="bg-red-900" style="grid-row-start: 2; grid-column-start: 5"></div>
                <div class="bg-red-900" style="grid-row-start: 22; grid-column-start: 41"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        zeropad ({ number, digits }) {
            let output = `${number}`
            const numberLength = output.length;

            if (digits > numberLength) {
                const zeros = digits - numberLength;

                for (let i = 0; i < zeros; i++) {
                    output = `0${output}`
                }
            }

            return output;
        }
    }
}
</script>
