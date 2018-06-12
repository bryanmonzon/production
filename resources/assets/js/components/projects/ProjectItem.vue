<template>
    <a :href='"/projects/"+project.id'
        class="list-group-item list-group-item-action d-flex"
    >
        <span class="mr-auto p-2">
            {{project.name}}
        </span>
        <span class="p-2">
            <span class="badge badge-pill badge-secondary" v-if="project.completed">Completed</span>
            <span class="badge badge-pill badge-success" v-else>In-Progress</span>
        </span>
    </a>
</template>

<script>
    export default {
        props: ['project']
    }
</script>