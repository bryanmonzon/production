<template>
    <div>
        <form @submit.prevent>
            <div class="form-group">
                <textarea class="form-control" v-model="form.question"></textarea>
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <button @click.prevent="submitQuestion" class="btn btn-primary">Ask a Question</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['endpoint'],
        data() {
            return {
                form: {
                    question: ''
                }
            }
        },
        methods: {
            submitQuestion() {
                axios.post(this.endpoint, this.form)
                    .then(res => {
                        console.log(res.data)
                        this.form.question = ''
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>