<template>
    <div>
        <div class="list-group">
                <a href="#" 
                    class="list-group-item list-group-item-action d-flex"
                    v-for="plan in plans" :key="plan.id"
                >
                    <span class="mr-auto p-2">
                        {{plan.name}}
                    </span>
                    <span class="p-2 text-secondary">
                        asasa
                    </span>
                    <span class="p-2">
                       <!--  @if($plan->completed) -->
                            <span class="badge badge-pill badge-secondary">Completed</span>
                        
                            <span class="badge badge-pill badge-success">In-Progress</span>
                    </span>
                </a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                plans: [
                    {
                        id: 1,
                        name: 'Hey'
                    },{
                        id: 2,
                        name: 'Ho'
                    },
                ]
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
