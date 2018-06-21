<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>My Tasks</span>
            <button class="btn btn-sm btn-outline-primary" @click="editing = true" v-if="!editing"><i class="fa fa-plus"></i> Add New Task</button>
            <button class="btn btn-sm btn-outline-secondary" @click="editing = false" v-else><i class="fa fa-times"></i> Close</button>
        </div>
        
        <div class="card-body" v-show="editing">
            <form>
                <div class="form-group">
                    <textarea class="form-control" @keydown.enter.prevent="addTask" v-model="form.body"></textarea>
                </div>
                <div class="form-group d-flex flex-row-reverse">
                    <button class="btn btn-primary">Save Task</button>
                </div>
            </form>
        </div>

        <div class="list-group">
            <div v-for="task in tasks" :key="task.id">
                <task-item :task="task" />
            </div>
        </div>
    </div>
</template>

<script>
    import TaskItem from './TaskItem'

    export default{
        components: {
            TaskItem
        },
        data() {
            return {
                editing: false,
                form: {
                    body: ''
                },
                tasks: []
            }
        },
        created() {
            this.fetchTasks()
        },
        computed: {
            classObject(task) {
                return {
                    'incomplete': !task.completed,
                    'complete': task.completed,
                }
            }
        },
        methods: {
            fetchTasks() {
                axios.get('/my/tasks/all')
                    .then(res => {
                        this.tasks = res.data
                    })
            },
            addTask() {
                this.tasks.unshift({
                    id: this.tasks.length + 1,
                    body: this.form.body,
                    completed: false,
                    due_date: '2018-06-04 00:00:00',
                    priority: 2
                })

                this.form.body = ''
            },
        }
    }
</script>
<style>
    .task-toggle-icon{
        cursor: pointer;
    }
    .complete .task-toggle-icon {
        color: #28a745;
    }

    .incomplete .task-toggle-icon {
        color: #6c757d;
    }

    .task-due-date {
        font-size:0.75rem;
        color: #6c757d;
    }
</style>
