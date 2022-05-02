<template>
    <div
        :class="{ 'bg-green-600 hover:bg-lime-500': selected }"
        class="cursor-pointer bg-red-900 hover:bg-yellow-300"
        :style="`grid-row-start: ${chair.row}; grid-column-start: ${chair.column}`"
        @click="toggleSelected"
    ></div>
</template>

<script>
export default {
    props: {
        chair: Object
    },
    data: () => ({
        selected: false
    }),
    methods: {
        toggleSelected () {
            this.selected = !this.selected;
        }
    }
};
</script>
