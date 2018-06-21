<template>
    <div 
        class="list-group-item d-flex flex-row align-items-center"
        :class="classObject"
    >
        <i class="task-toggle-icon far fa-stop mr-2"
            @click="toggleTask"
            v-if="!taskCompleted"
        ></i> 
        <i class="task-toggle-icon far fa-check mr-2" 
            @click="toggleTask"
            v-else
        ></i> 
        <span class="mr-2 task-body">{{ task.body }}</span>
        <span class="task-due-date" v-if="task.due_date">Due {{task.due_date | dateshort }}</span>
        <button class="btn btn-sm btn-outline-danger task-delete" @click="removeTask(task)"><i class="fa fa-times"></i></button>
    </div>
</template>

<script>
    export default {
        props: ['task'],
        data() {
            return {
                taskCompleted: this.task.completed
            }
        },
        computed: {
            classObject() {
                return {
                    'priority-4': this.task.priority === 4,
                    'priority-3': this.task.priority === 3,
                    'priority-2': this.task.priority === 2,
                    'priority-1': this.task.priority === 1,
                    'complete': this.taskCompleted,
                    'incomplete': !this.taskCompleted
                }
            }
        },
        methods: {
            toggleTask() {
                this.taskCompleted = !this.taskCompleted

                axios.patch(`/tasks/${this.task.id}`, {
                    completed: this.taskCompleted
                })
                .then(res => {
                    Bus.$emit('task:toggled', res.data)
                })
            },
            removeTask(task) {
                axios.delete(`/tasks/${task.id}`)
                    .then(res => {
                        Bus.$emit('task:deleted', task)
                    })
            }
        }
    }
</script>

<style lang="scss">
    .slide-fade-enter-active {
      transition: all .3s ease;
    }
    .slide-fade-leave-active {
      transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
      transform: translateX(10px);
      opacity: 0;
    }
    
    .priority-4 {
        border-left: 0px;
    }
    .priority-3 {
        border-left: 3px solid #17a2b8;
    }
    .priority-2 {
        border-left: 3px solid #ffc107;
    }
    .priority-1 {
        border-left: 3px solid #dc3545;
    }
    .task-delete {
        border:none;
    }
    .complete {
        .task-body,
        .task-due-date {
            opacity: .5;
            text-decoration:line-through;
        }
    }
    .remove-task {
        font-size: .75rem;
        color:#6c757d;
        text-decoration: none;
    }
</style>