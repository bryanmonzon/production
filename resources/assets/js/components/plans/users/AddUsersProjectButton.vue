<template>
    <button class="btn btn-primary" @click="showUsersProjectModal">
        Add Users to this Project
    </button>
</template>

<script>
    export default {
        methods: {
            showUsersProjectModal() {
                Bus.$emit('showUsersProjectModal')
            }
        }
    }
</script>