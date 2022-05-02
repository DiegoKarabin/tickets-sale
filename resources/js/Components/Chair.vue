<template>
    <div class="bg-red-900" :style="`grid-row-start: ${chair.row}; grid-column-start: ${chair.column}`"></div>
</template>

<script>
export default {
    props: {
        chair: Object
    }
}
</script>
