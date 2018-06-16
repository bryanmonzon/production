<template>
    <div class="list-group">
        <concern-item v-for="concern in concerns" :key="concern.id" :concern="concern" />
    </div>
</template>

<script>
    import ConcernItem from './ConcernItem'
    export default {
        props: ['endpoint'],
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

            Bus.$on('concern:added', function() {
                self.fetchConcerns()
            });
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
    .concern-date {
        font-size:.75rem;
    }
</style>