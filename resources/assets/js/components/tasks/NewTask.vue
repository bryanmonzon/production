<template>
    <form @submit.prevent="addTask" @keydown.enter.prevent="addTask">
        <div class="form-group">
            <textarea class="form-control" v-model="form.body"></textarea>
        </div>
        <div class="form-group">
            <label for="">Set the priority</label>
            <select class="form-control" v-model="form.priority">
                <option value="4">4 (lowest priority)</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1 (highest priority)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Select a Project</label>
            <select class="form-control" v-model="form.project">
                <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.name }}</option>
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
                    project: ''
                },
                projects: []

            }
        },
        mounted() {
            this.fetchProjects()
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
            fetchProjects() {
                axios.get('/projects/all')
                    .then(res => {
                        this.projects = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }

        }
    }
</script>