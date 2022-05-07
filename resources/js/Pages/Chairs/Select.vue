<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chairs from '@/Components/Chairs.vue';

defineProps({
    chairs: Array,
    orderId: Number
})

const form = useForm({
    selectedChairs: []
});
</script>

<template>
    <Head title="Seleccionar sillas" />

    <div class="min-h-screen bg-slate-900">
        <Navbar />
        <form @submit.prevent="submit">
            <Chairs
                :chairs="chairs"
                :select-enabled="true"
                @toggle-selected="manageChairSelection"
            />
            <div class="px-4 py-3 text-right sm:px-6 border-t border-gray-600">
                <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-200 text-slate-700 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                >
                    Guardar
                </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data: () => ({
        selectedChairs: []
    }),
    methods: {
        manageChairSelection ({ id }) {
            const selectedChairs = this.form.selectedChairs;
            const index = selectedChairs.indexOf(id);

            if (index == -1) {
                selectedChairs.push(id);
            } else {
                selectedChairs.splice(index, 1);
            }
        },
        submit () {
            const form = this.form;

            if (form.selectedChairs.length > 0) {
                form.post(route('chairs.occupy', { order_id: this.orderId }));
            }
        }
    }
};
</script>
