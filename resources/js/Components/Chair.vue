<template>
    <div
        class="cursor-pointer border border-black text-center"
        :class="colorClass"
        :style="`grid-area: ${chair.row} / ${chair.column} / span 2 / span 2; font-size: 11px`"
        @click="toggleSelected"
        v-text="chair.number"
    ></div>
</template>

<script>
export default {
    computed: {
        colorClass () {
            if (this.occupied) return 'bg-teal-300 cursor-default hover:cursor-default';

            if (this.selected) return 'bg-green-600 hover:bg-lime-500';

            if (this.chair.type == 'PLATINUM') return 'bg-pink-600 hover:bg-pink-300';

            if (this.chair.type == 'VIP') return 'bg-indigo-600 hover:bg-indigo-300';

            if (this.chair.type == 'SPONSOR') return 'bg-orange-400 hover:bg-orange-300';

            return 'bg-white hover:bg-gray-400';
        },
        occupied () {
            return !!this.chair.order_id;
        }
    },
    props: {
        chair: Object,
        selected: Boolean
    },
    methods: {
        toggleSelected () {
            if (this.occupied) return;

            this.$emit('toggle-selected', { id: this.chair.id });
        }
    }
};
</script>
