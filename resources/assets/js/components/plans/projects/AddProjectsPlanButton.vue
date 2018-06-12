<template>
    <button class="btn btn-primary" @click="showProjectsPlanModal">
        Add Projects to this Plan
    </button>
</template>

<script>
    export default {
        methods: {
            showProjectsPlanModal() {
                Bus.$emit('showProjectsPlanModal')
            }
        }
    }
</script>