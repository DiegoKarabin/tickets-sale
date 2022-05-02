<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Panel" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-400 leading-tight">
                Panel
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-700 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-300 border-b border-slate-500">
                        <a :href="route('orders.create')" class="text-lg">
                            Registrar compra
                        </a>
                    </div>

                    <div class="p-6 text-gray-300">
                        <a :href="route('chairs')" class="text-lg">
                            Ver esquema de sillas vendidas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
