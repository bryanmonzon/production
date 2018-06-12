<template>
    <div>
        <div class="list-group">
            <plan-projects-item 
                v-for="project in projects" 
                :project="project" 
                :key="project.id"
                :plan="JSON.parse(plan)"
             />
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
            console.log('plan', typeof this.plan)
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
