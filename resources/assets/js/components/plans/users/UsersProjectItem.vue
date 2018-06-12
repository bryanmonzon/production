<template>
    <li class="list-group-item list-group-item-action d-flex">
        <span class="mr-auto p-2">
            {{user.name}}
        </span>
        <span class="p-2">
            <span class="badge badge-pill badge-secondary" v-if="user.completed">Completed</span>
            <span class="badge badge-pill badge-success" v-else>In-Progress</span>
        </span>
    </li>
</template>

<script>
    export default {
        props: ['user', 'plan'],
    }
</script>