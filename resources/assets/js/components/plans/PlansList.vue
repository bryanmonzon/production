<template>
    <div>
        <div class="list-group">
            <a href="#" 
                class="list-group-item list-group-item-action d-flex"
                v-for="plan in plans" :key="plan.id"
            >
                <span class="mr-auto p-2">
                    <a :href='"/plans/"+plan.id'>{{plan.name}}</a>
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
        mounted() {
            this.fetchPlans()
        },
        methods: {
            fetchPlans() {
                axios.get('/plans')
                    .then( res => {
                        console.log(res.data);
                        this.plans = res.data
                    });
            }
        }
    }
</script>
