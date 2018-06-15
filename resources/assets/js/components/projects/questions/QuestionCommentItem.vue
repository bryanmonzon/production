<template>
    <div class="list-group-item" :class="{ 'bg-light': question.resolved }">
      <div class="d-flex flex-column">
        <span><strong>{{comment.user.name}}</strong> {{comment.body}}</span>
        <span style="font-size:.75rem;">{{comment.created_at | datetime}} <span v-if="ownsComment">• <a href="#" class="text-muted" @click.prevent="deleteComment">Delete</a></span></span>
      </div>
    </div>
</template>
<script>
    export default {
        props: ['comment', 'question'],
        methods: {
            ownsComment() {
                return this.comment.id === user.id
            },
            deleteComment() {
                axios.delete(`/comments/${this.comment.id}`)
                    .then(res => {
                        Bus.$emit('comment:deleted')
                    })
            }
        }
    }
</script>