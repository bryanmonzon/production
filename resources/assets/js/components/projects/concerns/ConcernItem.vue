<template>
    <div class="list-group-item d-flex justify-content-between align-items-center" :class="classObject">
        <span class="d-flex flex-wrap align-items-center">
            <div class="mr-2 concern-body">{{ concern.body }}</div>
            <span class="concern-date text-muted concern-author">{{concern.created_at | date }} by {{concern.user.name}}</span>
        </span>
        <resolve-concern :concern="concern" />
    </div>
</template>

<script>
    import ResolveConcern from './ResolveConcern'
    export default {
        props: ['concern'],
        components: {
            ResolveConcern
        },
        data() {
            return {
                resolved: this.concern.resolved
            }
        },
        computed: {
            classObject() {
                return {
                    'priority-4': this.concern.priority === 4,
                    'priority-3': this.concern.priority === 3,
                    'priority-2': this.concern.priority === 2,
                    'priority-1': this.concern.priority === 1,
                    'concern-resolved': this.resolved,
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
    .concern-resolved .concern-body,
    .concern-resolved .concern-author {
        opacity: .5;
    }
</style>