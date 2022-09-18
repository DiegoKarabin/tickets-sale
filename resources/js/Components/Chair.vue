<template>
    <div
        class="cursor-pointer"
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
            if (this.occupied) return 'bg-gray-800 cursor-default hover:cursor-default';

            if (this.selected) return 'bg-green-600 hover:bg-lime-500';

            return 'bg-red-900 hover:bg-yellow-300';
        },
        occupied () {
            return !!this.chair.order_id;
        }
    },
    data: () => ({
        selected: false
    }),
    props: {
        chair: Object
    },
    methods: {
        toggleSelected () {
            if (this.occupied) return;

            this.selected = !this.selected;

            this.$emit('toggle-selected', { id: this.chair.id });
        }
    }
};
</script>
