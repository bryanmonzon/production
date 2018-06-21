<template>
    <form>
        <div class="form-group">
            <textarea class="form-control" @keydown.enter.prevent="addTask" v-model="form.body"></textarea>
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <button class="btn btn-primary">Save Task</button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    body: ''
                }
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