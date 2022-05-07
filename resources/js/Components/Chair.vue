<template>
    <div
        class="cursor-pointer"
        :class="colorClass"
        :style="`grid-area: ${chair.row} / ${chair.column} / span 2 / span 2;`"
        @click="toggleSelected"
    ></div>
</template>

<script>
export default {
    computed: {
        colorClass () {
            const selected = this.selected;
            let output = 'bg-red-900 hover:bg-yellow-300';

            if (this.occupied) {
                output = 'bg-gray-800 cursor-default hover:cursor-default';
            } else if (selected) {
                output = 'bg-green-600 hover:bg-lime-500';
            }

            return output;
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
