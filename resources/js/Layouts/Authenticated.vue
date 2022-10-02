<script setup>
import { ref } from '@vue/reactivity'
import Navbar from '@/Components/Navbar.vue'
import Notification from '@/Components/Notification.vue'

const dynamicClasses = ref({});
const hideNotification = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-slate-900">
            <Navbar />

            <!-- Page Heading -->
            <header class="bg-slate-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>

            <!-- Notification -->
            <Notification
                v-if="$page.props.flash.notice && !hideNotification"
                class=" transition-opacity duration-1000"
                :class="dynamicClasses"
            />
        </div>
    </div>
</template>

<script>
export default {
    async mounted() {
        const wait = ms => new Promise(resolve => setTimeout(resolve, ms));

        await wait(3000);

        this.dynamicClasses['opacity-0'] = true;

        await wait(1001);

        this.hideNotification = true;
    }
}
</script>
