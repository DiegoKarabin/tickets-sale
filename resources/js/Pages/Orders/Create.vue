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
    promoter: null
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
                                            <label for="first-name" class="block font-medium text-gray-300">Nombre</label>
                                            <input type="text" name="first_name" id="first-name" v-model="form.first_name" autocomplete="given-name" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block font-medium text-gray-300">Apellido</label>
                                            <input type="text" name="last_name" id="last-name" v-model="form.last_name" autocomplete="family-name" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="identification-number" class="block font-medium text-gray-300">Cédula</label>
                                            <input type="text" name="identification_number" id="identification-number" v-model="form.identification_number" autocomplete="identification-number" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone" class="block font-medium text-gray-300">Teléfono</label>
                                            <input type="text" name="phone" id="phone" v-model="form.phone" autocomplete="phone" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="church" class="block font-medium text-gray-300">Iglesia</label>
                                            <input type="text" name="church" id="church" v-model="form.church" autocomplete="church" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="team" class="block font-medium text-gray-300">Subred</label>
                                            <input type="text" name="team" id="team" v-model="form.team" autocomplete="team" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6">
                                            <label for="promoter" class="block font-medium text-gray-300">Promotor</label>
                                            <input type="text" name="promoter" id="promoter" v-model="form.promoter" autocomplete="promoter" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6">
                                            <button type="submit" class="w-full inline-block border border-gray-600 rounded p-3 text-center text-lg text-gray-400 hover:bg-slate-600 hover:cursor-pointer">
                                                Selecionar sillas
                                            </button>
                                        </div>

                                        <div class="col-span-6" v-if="chairsSelected">
                                            <label class="block font-medium text-gray-300">Sillas seleccionadas</label>
                                            <div class="w-full border border-gray-600 rounded p-3 flex flex-wrap">
                                                <div class="inline-block bg-white py-1 px-3 text-sm rounded mr-2">
                                                    101
                                                </div>
                                                <div class="inline-block bg-white py-1 px-3 text-sm rounded">
                                                    102
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6 border-t border-gray-600" v-if="chairsSelected">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-200 text-slate-700 hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
