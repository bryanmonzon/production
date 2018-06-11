<template>
    <div>
        <div class="list-group">
            <a :href='"/plans/"+plan.id'
                class="list-group-item list-group-item-action d-flex"
                v-for="plan in plans" :key="plan.id"
            >
                <span class="mr-auto p-2">
                    {{plan.name}}
                </span>
                <span class="p-2 text-secondary">
                    {{ plan.projects.length}} projects
                </span>
                <span class="p-2">
                    <span class="badge badge-pill badge-secondary" v-if="plan.completed">Completed</span>
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
                plans: []
            }
        },
        created() {
            let self = this
            this.fetchPlans()

            Bus.$on('plan:added', function() {
                self.fetchPlans()
            });
        },
        methods: {
            fetchPlans() {
                axios.get('/plans')
                    .then( res => {
                        this.plans = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>
