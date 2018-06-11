<template>
    <div>
        <div class="list-group">
            <a :href='"/projects/"+project.id'
                class="list-group-item list-group-item-action d-flex"
                v-for="project in projects" :key="project.id"
            >
                <span class="mr-auto p-2">
                    {{project.name}}
                </span>
                <span class="p-2">
                    <span class="badge badge-pill badge-secondary" v-if="project.completed">Completed</span>
                    <span class="badge badge-pill badge-success" v-else>In-Progress</span>
                </span>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: []
            }
        },
        created() {
            let self = this
            this.fetchProjects()

            Bus.$on('project:added', function() {
                self.fetchProjects()
            });
        },
        methods: {
            fetchProjects() {
                axios.get('/projects')
                    .then( res => {
                        this.projects = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>
