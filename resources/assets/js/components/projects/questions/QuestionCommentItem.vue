<template>
    <div class="list-group-item" :class="{ 'bg-light': question.resolved }">
      <div class="d-flex flex-column">
        <span>
            <strong>{{comment.user.name}}</strong>
            <div @click="toggle" v-if="ownsComment(comment) || !editing">{{comment.body}}</div> 
            <div v-else>
                <input type="text" class="form-control" @keydown.enter="updateComment" v-model="form.body" autofocus>
                <span style="font-size:.75rem;" class="font-italic">
                    <a href="#" class="text-muted" @click.prevent="editing = false">Cancel</a>
                </span>
            </div>
        </span>
        <span style="font-size:.75rem;">{{comment.created_at | datetime}} 
            <span v-if="ownsComment(comment)">• 
                <a href="#" 
                    class="text-muted" 
                    @click.prevent="deleteComment(comment)"
                >Delete</a> 
                <span v-if="!editing">or <a href="#" class="text-muted" @click.prevent="toggle">Edit</a></span>
            </span>
        </span>
      </div>
    </div>
</template>
<script>
    export default {
        props: ['comment', 'question'],
        data() {
            return {
                editing: false,
                form: {
                    body: this.comment.body
                }
            }
        },
        methods: {
            ownsComment(comment) {
                return comment.user.id === user.id
            },
            deleteComment(comment) {
                axios.delete(`/comments/${comment.id}`)
                    .then(res => {
                        Bus.$emit('comment:deleted', comment)
                    })
            },
            updateComment() {
                axios.patch(`/comments/${this.comment.id}`, this.form)
                    .then( res => {
                        this.comment.body = res.data.body 
                        this.editing = false
                    })
            },
            toggle() {
                this.form.body = this.comment.body
                this.editing = !this.editing
            }
        }
    }
</script>