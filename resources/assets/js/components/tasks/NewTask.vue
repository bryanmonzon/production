<template>
    <form @submit.prevent="addTask" @keydown.enter.prevent="addTask">
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
            <button class="btn btn-primary"
                type="submit" 
                @click.prevent="addTask"
                :disabled="validateFormTask"
            >Save Task</button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    body: '',
                    priority: 4,
                }
            }
        },
        computed: {
            validateFormTask() {
                return this.form.body.length > 0 ? false : true
            }
        },
        methods: {
            addTask() {
                axios.post('/tasks', this.form)
                    .then(res => {
                        Bus.$emit('task:added', res.data)
                        this.form.body = ''
                    })
                    .catch(err => {
                        console.log(err)
                    })

            },
        }
    }
</script>