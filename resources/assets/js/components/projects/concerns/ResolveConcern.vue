<template>
    <span>
        <button class="btn btn-sm btn-outline-secondary" 
            @click="resolveConcern" 
            v-if="!this.resolved"
        >
            <i class="far fa-circle"></i> Resolve
        </button>
        <button class="btn btn-sm btn-success" 
            @click="resolveConcern" 
            v-else
        >
            <i class="far fa-check-circle"></i> Resolved
        </button>
    </span>
</template>

<script>
    export default {
        props: ['concern'],
        data() {
            return {
                resolved: this.concern.resolved
            }
        },
        methods: {
            resolveConcern() {
                this.resolved = !this.resolved
                axios.patch(`/concerns/${this.concern.id}`, {
                    resolved: this.resolved
                })
                .then(res => {
                    Bus.$emit('concern:resolved', res.data)
                })
                .catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>