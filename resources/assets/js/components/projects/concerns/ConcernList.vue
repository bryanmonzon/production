<template>
    <div class="list-group concerns">
        <transition-group name="slide-fade">
            <concern-item v-for="concern in concerns" :key="concern.id" :concern="concern" />
        </transition-group>
    </div>
</template>

<script>
    import ConcernItem from './ConcernItem'
    export default {
        props: ['endpoint', 'projectId'],
        components: {
            ConcernItem
        }, 
        data() {
            return {
                concerns: []
            }
        },
        created() {
            let self = this
            this.fetchConcerns()

            Bus.$on('concern:added-'+this.projectId, function(concern) {
                self.concerns.unshift(concern)
            });

            console.log('projects.'+this.projectId+'.concerns')
            Echo.channel('projects.'+this.projectId+'.concerns')
                .listen('ConcernWasCreated', (e) => {
                    self.concerns.unshift(e.concern)
                })


            Bus.$on('concern:deleted', function(concern) {
              self.concerns.splice(self.concerns.indexOf(concern), 1)
            })
        },
        methods: {
            fetchConcerns() {
                axios.get(this.endpoint)
                    .then(res => {
                        this.concerns = res.data
                    })
                    .catch( err => {
                        console.log(err)
                    })
            }
        }
    }
</script>

<style>
    .concerns .list-group-item:first-child{
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        }
    .concern-date {
        font-size:.75rem;
    }
</style>