<template>
    <div>
        <div class="list-group" v-if="projects.length > 0">
            <plan-projects-item 
                v-for="project in projects" 
                :project="project" 
                :key="project.id"
                :plan="JSON.parse(plan)"
             />
        </div>
        <div class="card-body" v-else>
            <p>Add projects to this plan.</p>
        </div>
    </div>
</template>

<script>
    import PlanProjectsItem from './PlanProjectsItem';
    export default {
        props: ['endpoint', 'plan'],
        components: {
            PlanProjectsItem
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

            Bus.$on('project:removed', function() {
                self.fetchProjects()
            });
        },
        methods: {
            fetchProjects() {
                axios.get(this.endpoint)
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