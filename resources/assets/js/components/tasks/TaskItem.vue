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
            }
        }
    }
</script>

<style lang="scss">
    .complete {
        .task-body,
        .task-due-date {
            opacity: .5;
            text-decoration:line-through;
        }
    }
</style>