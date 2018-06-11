<template>
    <div>
        <div class="list-group">
            <project-item v-for="project in projects" :project="project" :key="project.id" />
        </div>
    </div>
</template>

<script>
    import ProjectItem from './ProjectItem';
    export default {
        props: ['endpoint'],
        components: {
            ProjectItem
        },
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
                axios.get(this.endpoint)
                    .then( res => {
                        console.log(res)
                        this.projects = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>
