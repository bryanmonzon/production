<template>
    <div>
        <form @submit="submitConcern" @keydown.enter="submitConcern">
            <div class="form-group">
                <textarea class="form-control" v-model="form.body"></textarea>
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <button @click.prevent="submitConcern" 
                    class="btn btn-primary"
                    :disabled="validateFormConcern"
                >Add your Concern</button>
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
                    body: ''
                }
            }
        },
        computed: {
            validateFormConcern() {
                return this.form.body.length > 0 ? false : true
            }
        },
        methods: {
            submitConcern() {
                axios.post(this.endpoint, this.form)
                    .then(res => {
                        this.form.body = ''
                        Bus.$emit('concern:added', res.data);
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>