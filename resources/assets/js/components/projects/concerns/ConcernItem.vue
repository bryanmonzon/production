<template>
    <div class="list-group-item d-flex justify-content-between align-items-center" :class="classObject">
        <span class="d-flex flex-wrap align-items-center">
            <div class="mr-2">{{ concern.body }}</div>
            <span class="concern-date text-muted">{{concern.created_at | date }} by {{concern.user.name}}</span>
        </span>
        <span>
            <button class="btn btn-sm btn-outline-secondary">Mark as Resolved</button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['concern'],
        computed: {
            classObject() {
                return {
                    'priority-4': this.concern.priority === 4,
                    'priority-3': this.concern.priority === 3,
                    'priority-2': this.concern.priority === 2,
                    'priority-1': this.concern.priority === 1,
                }
            }
        }
    }
</script>

<style>
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
</style>