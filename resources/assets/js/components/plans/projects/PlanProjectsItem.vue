<template>
    <div class="list-group-item list-group-item-action d-flex">
        <span class="mr-auto p-2">
            <a :href='`/plans/${plan.id}/projects/${project.id}`' class="d-flex">
                {{project.name}}
            </a>
        </span>
        <span class="p-2">
            <span class="badge badge-pill badge-secondary" v-if="project.completed">Completed</span>
            <span class="badge badge-pill badge-success" v-else>In-Progress</span>
        </span>
        <span class="p-2">
            <button type="button" class="btn btn-sm btn-outline-warning" @click="removeProject">Remove</button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['project', 'plan'],
        methods: {
            removeProject() {
                axios.delete(`/plans/${this.plan.id}/projects/${this.project.id}/`)
                    .then(res => {
                        Bus.$emit('project:removed');
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>