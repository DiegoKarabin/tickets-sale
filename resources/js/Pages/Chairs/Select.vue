<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chairs from '@/Components/Chairs.vue';

defineProps({
    chairs: Array,
    couponsCount: Number,
    orderId: Number,
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
                :selected-chairs="form.selectedChairs"
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
    methods: {
        manageChairSelection ({ id }) {
            const selectedChairs = this.form.selectedChairs;
            const index = selectedChairs.indexOf(id);

            if (index >= 0) {
                selectedChairs.splice(index, 1);
                return;
            }

            if (selectedChairs.length >= this.couponsCount) return;

            selectedChairs.push(id);
        },
        async submit () {
            const form = this.form;
            const couponsCount = this.couponsCount

            if (form.selectedChairs.length != couponsCount) {
                alert(`Debe seleccionar ${couponsCount} sillas.`);
                return;
            }

            if (!confirm('¿Está seguro de ocupar las sillas seleccionadas?')) return;

            await form.post(route('chairs.occupy', { order_id: this.orderId }));
        }
    }
};
</script>
