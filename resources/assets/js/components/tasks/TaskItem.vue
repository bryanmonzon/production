<template>
    <div 
        class="list-group-item d-flex flex-row align-items-center"
        :class="{complete: taskCompleted, incomplete: !taskCompleted}"
    >
        <i class="task-toggle-icon far fa-stop mr-2"
            @click="toggleTask"
            v-if="!taskCompleted"
        ></i> 
        <i class="task-toggle-icon far fa-check mr-2" 
            @click="toggleTask"
            v-else
        ></i> 
        <span class="mr-2">{{ task.body }}</span>
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
        methods: {
            toggleTask() {
                this.taskCompleted = !this.taskCompleted
            }
        }
    }
</script>