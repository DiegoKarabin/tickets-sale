<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: null,
    last_name: null,
    identification_number: null,
    phone: null,
    church: null,
    team: null,
    promoter: null,
    coupons: []
});

const submit = () => {
    form.post(route('orders.store'));
}
</script>

<template>
    <Head title="Registrar compra" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-400 leading-tight">
                Registrar compra
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-inherit sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="first-name" class="block font-medium text-gray-300">
                                                Nombre
                                            </label>
                                            <input
                                                type="text"
                                                name="first_name"
                                                id="first-name"
                                                v-model="form.first_name"
                                                autocomplete="given-name"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.first_name)"
                                            />
                                            <span v-if="errors.first_name" class="text-red-600">
                                                {{ errors.first_name }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block font-medium text-gray-300">
                                                Apellido
                                            </label>
                                            <input
                                                type="text"
                                                name="last_name"
                                                id="last-name"
                                                v-model="form.last_name"
                                                autocomplete="family-name"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.last_name)"
                                            />
                                            <span v-if="errors.last_name" class="text-red-600">
                                                {{ errors.last_name }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="identification-number" class="block font-medium text-gray-300">
                                                Cédula
                                            </label>
                                            <input
                                                type="text"
                                                name="identification_number"
                                                id="identification-number"
                                                v-model="form.identification_number"
                                                autocomplete="identification-number"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.identification_number)"
                                            />
                                            <span v-if="errors.identification_number" class="text-red-600">
                                                {{ errors.identification_number }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone" class="block font-medium text-gray-300">
                                                Teléfono
                                            </label>
                                            <input
                                                type="text"
                                                name="phone"
                                                id="phone"
                                                v-model="form.phone"
                                                autocomplete="phone"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.phone)"
                                            />
                                            <span v-if="errors.phone" class="text-red-600">
                                                {{ errors.phone }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="church" class="block font-medium text-gray-300">
                                                Iglesia
                                            </label>
                                            <input
                                                type="text"
                                                name="church"
                                                id="church"
                                                v-model="form.church"
                                                autocomplete="church"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.church)"
                                            />
                                            <span v-if="errors.church" class="text-red-600">
                                                {{ errors.church }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="team" class="block font-medium text-gray-300">
                                                Subred
                                            </label>
                                            <input
                                                type="text"
                                                name="team"
                                                id="team"
                                                v-model="form.team"
                                                autocomplete="team"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.team)"
                                            />
                                            <span v-if="errors.team" class="text-red-600">
                                                {{ errors.team }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="promoter" class="block font-medium text-gray-300">
                                                Promotor
                                            </label>
                                            <input
                                                type="text"
                                                name="promoter"
                                                id="promoter"
                                                v-model="form.promoter"
                                                autocomplete="promoter"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                :class="errorClass(errors.promoter)"
                                            />
                                            <span v-if="errors.promoter" class="text-red-600">
                                                {{ errors.promoter }}
                                            </span>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="coupons-quantity" class="block font-medium text-gray-300">
                                                Cantidad de cupones comprados
                                            </label>
                                            <input
                                                type="number"
                                                name="coupons_quantity"
                                                v-model="couponsQuantity"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                                @change="updateCouponsMap"
                                                min="1"
                                            />
                                        </div>

                                        <div v-for="(_, i) of form.coupons" :key="i" class="col-span-6 sm:col-span-3">
                                            <label
                                                :for="`coupon-${i + 1}`"
                                                class="block font-medium text-gray-300"
                                                v-text="`Cupón #${i + 1}`"
                                            >
                                            </label>
                                            <input
                                                :id="`coupon-${i + 1}`"
                                                type="text"
                                                :name="`coupons[${i}]`"
                                                v-model="form.coupons[i]"
                                                class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md"
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <button type="submit" :disabled="form.processing" class="w-full inline-block border border-gray-600 rounded p-3 text-center text-lg text-gray-400 hover:bg-slate-600 hover:cursor-pointer">
                                                Selecionar sillas
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
export default {
    data: () => ({
        couponsQuantity: 0
    }),
    props: {
        errors: Object
    },
    methods: {
        errorClass(error) {
            return { 'border-2 border-rose-600': error };
        },
        updateCouponsMap() {
            const difference = this.couponsQuantity - this.form.coupons.length;

            for (let i = 0; i < Math.abs(difference); i++) {
                if (difference > 0) this.form.coupons.push('');

                if (difference < 0) this.form.coupons.pop();
            }
        }
    }
}
</script>
