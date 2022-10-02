<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navbar.vue';
import Chair from '@/Components/Chair.vue';

defineProps({
    chairs: Array,
    selectedChairs: Array,
    selectEnabled: Boolean
})
</script>

<template>
    <div class="mt-6 flex flex-col sm:justify-center items-center overflow-auto">
        <div
            :class="{ 'relative': !selectEnabled }"
            class="w-full h-screen min-w-[1400px] min-h-[720px] grid gap-0"
            style="grid-template-columns: repeat(184, 1fr); grid-template-rows: repeat(101, 1fr); background: #9195ac;"
        >
            <Chair
                v-for="chair of chairs"
                :key="chair.id"
                :chair="chair"
                :selected="selectEnabled && isChairSelected(chair)"
                @toggle-selected="toggleSelected"
            />

            <!-- Row letters -->
            <div
                v-for="chair of firstChairs"
                :key="chair.id"
                :style="rowLabel(chair)"
                class="text-center font-black"
                v-text="chair.row_code"
            >
            </div>

            <!-- Section names -->
            <div
                class="text-2xl uppercase"
                style="grid-area: 7 / 2 / span 2 / span 2; writing-mode: vertical-lr; text-orientation: upright;"
            >
                Izquierda
            </div>

            <div
                class="text-2xl uppercase"
                style="grid-area: 7 / 180 / span 2 / span 2; writing-mode: vertical-lr; text-orientation: upright;"
            >
                Derecha
            </div>

            <div
                class="text-2xl uppercase text-center"
                style="grid-area: 25 / 61 / span 2 / span 64"
            >
                Central
            </div>

            <!-- Altar -->
            <div
                class="text-2xl uppercase text-center bg-blue-900 text-white flex items-center justify-center"
                style="grid-area: 1 / 65 / span 8 / span 56"
            >
                <span>Altar</span>
            </div>

            <!-- Camera equipement -->
            <div class="bg-yellow-300" style="grid-area: 45 / 95 / span 6 / span 6"></div>
            <div class="bg-yellow-300" style="grid-area: 59 / 22 / span 7 / span 5"></div>
            <div class="bg-yellow-300" style="grid-area: 47 / 156 / span 6 / span 6"></div>

            <!-- Captions -->
            <div
                class="text-2xl uppercase text-center"
                style="grid-area: 89 / 61 / span 2 / span 64"
            >
                Leyenda
            </div>
            <div class="bg-pink-600 border border-black" style="grid-area: 95 / 53 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 56 / span 2 / span 8">Platinum</div>
            <div class="bg-indigo-600 border border-black" style="grid-area: 95 / 67 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 70 / span 2 / span 8">VIP</div>
            <div class="bg-orange-400 border border-black" style="grid-area: 95 / 75 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 78 / span 2 / span 8">Patrocinante</div>
            <div class="bg-white border border-black" style="grid-area: 95 / 94 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 97 / span 2 / span 8">General</div>
            <div class="bg-teal-300 border border-black" style="grid-area: 95 / 107 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 110 / span 2 / span 8">Ocupada</div>
            <div class="bg-violet-400 border border-black" style="grid-area: 95 / 121 / span 2 / span 2"></div>
            <div class="text-lg uppercase" style="grid-area: 95 / 124 / span 2 / span 8">Reservada</div>

            <!-- Glass -->
            <div v-if="!selectEnabled" class="absolute top-0 left-0 w-full h-full"></div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        toggleSelected ({ id }) {
            this.$emit('toggle-selected', { id });
        },
        rowLabel({section_code, row, column}) {
            if (section_code == 'C') return `grid-area: ${row} / ${column - 2} / span 2 / span 2`;

            return `grid-area: ${row - 2} / ${column} / span 2 / span 2`;
        },
        isChairSelected({ id }) {
            return this.selectedChairs.includes(id);
        }
    },
    computed: {
        firstChairs() {
            return this.chairs.filter(chair => chair.number == 1);
        }
    }
};
</script>
