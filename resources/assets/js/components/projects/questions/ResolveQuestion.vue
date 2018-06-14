<template>
    <span>
        <label style="margin-bottom:0px;" :for="'question-'+question.id" class="text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
            <span class="mr-2" v-if="!resolved">Resolve</span>
            <span class="mr-2" v-else>Resolved</span>
            <input type="checkbox" :id="'question-'+question.id" v-model="resolved" @click="resolveQuestion">
        </label>
    </span>
</template>
<script>
    export default {
        props: ['question'],
        data() {
            return {
                resolved: false
            }
        },
        mounted() {
            this.resolved = this.question.resolved
        },
        methods: {
            resolveQuestion(e) {
                this.resolved = e.target.checked
                
                axios.patch(`/questions/${this.question.id}`, {
                    resolved: this.resolved
                })
                .then( res => {
                    Bus.$emit('question:resolved', res.data)
                })
                .catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>