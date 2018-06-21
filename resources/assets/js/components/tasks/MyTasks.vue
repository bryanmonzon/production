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
                <div 
                    class="list-group-item d-flex flex-row align-items-center"
                    :class="{complete: task.completed == true, incomplete: task.incomplete == false}"
                >
                    <i class="task-toggle-icon far fa-stop mr-2"
                        v-if="!task.completed"
                    ></i> 
                    <i class="task-toggle-icon far fa-check mr-2" v-else></i> 
                    <span class="mr-2">{{ task.body }}</span>
                    <span class="task-due-date">Due {{task.due_date | dateshort }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
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
