<template>
    <div>
        <form @submit.prevent="submitConcern" @keydown.enter="submitConcern">
            <div class="form-group">
                <textarea class="form-control" v-model="form.body"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control" v-model="form.priority">
                    <option :value="4">4 (lowest priority)</option>
                    <option :value="3">3</option>
                    <option :value="2">2</option>
                    <option :value="1">1 (highest priority)</option>
                </select>
            </div>
            <div class="form-group d-flex flex-row-reverse">
                <button 
                    type="button"
                    @click.prevent="submitConcern"
                    class="btn btn-primary"
                    :disabled="validateFormConcern"
                >Add your Concern</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['endpoint', 'projectId'],
        data() {
            return {
                form: {
                    body: '',
                    priority: 4
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
                        this.form.priority = 4
                        Bus.$emit('concern:added-'+this.projectId, res.data);
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>