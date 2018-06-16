<template>
    <button class="btn btn-sm btn-primary" @click="showUsersProjectModal">
        <i class="fas fa-users"></i> Add Users
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