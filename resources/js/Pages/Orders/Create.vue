<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Panel" />

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
                                            <input type="text" name="first_name" id="first-name" autocomplete="given-name" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block font-medium text-gray-300">Apellido</label>
                                            <input type="text" name="last_name" id="last-name" autocomplete="family-name" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="identification-number" class="block font-medium text-gray-300">Cédula</label>
                                            <input type="text" name="identification_number" id="identification-number" autocomplete="identification-number" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone" class="block font-medium text-gray-300">Teléfono</label>
                                            <input type="text" name="phone" id="phone" autocomplete="phone" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6">
                                            <label for="team" class="block font-medium text-gray-300">Subred</label>
                                            <input type="text" name="team" id="team" autocomplete="team" class="mt-1 bg-slate-700 text-gray-300 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-600 rounded-md" />
                                        </div>

                                        <div class="col-span-6">
                                            <a class="w-full inline-block border border-gray-600 rounded p-3 text-center text-lg text-gray-400 hover:bg-slate-600 hover:cursor-pointer">
                                                Selecionar sillas
                                            </a>
                                        </div>

                                        <div class="col-span-6">
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
                                <div class="px-4 py-3 text-right sm:px-6 border-t border-gray-600">
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
