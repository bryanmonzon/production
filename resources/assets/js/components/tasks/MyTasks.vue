<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>My Tasks</span>
            <button class="btn btn-sm btn-outline-primary" @click="editing = true" v-if="!editing"><i class="fa fa-plus"></i> Add New Task</button>
            <button class="btn btn-sm btn-outline-secondary" @click="editing = false" v-else><i class="fa fa-times"></i> Close</button>
        </div>
        
        <div class="card-body" v-show="editing">
            <new-task />
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
    import NewTask from './NewTask'

    export default{
        components: {
            TaskItem,
            NewTask,
        },
        data() {
            return {
                editing: false,
                tasks: []
            }
        },
        created() {
            let self = this
            this.fetchTasks()

            Bus.$on('task:added', function(task) {
                self.tasks.unshift(task)
            })

            Bus.$on('task:deleted', function(task) {
              self.tasks.splice(self.tasks.indexOf(task), 1)
            })
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
            }
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
