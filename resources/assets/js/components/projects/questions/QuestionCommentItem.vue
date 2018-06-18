<template>
    <div class="list-group-item" :class="{ 'bg-light': question.resolved }">
      <div class="d-flex flex-column">
        <span class="comment-author">
            <strong><a href="#">{{comment.user.name}}</a></strong>
            <div @click="toggle" v-show="!editing" style="display:inline">{{comment.body}}</div> 
            <input type="text" class="form-control" @keydown.enter="updateComment" v-model="form.body" v-if="editing" autofocus>
            <span style="font-size:.75rem;" class="font-italic" v-if="editing">
                <a href="#" class="text-muted" @click.prevent="editing = false">Cancel</a>
            </span>
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
                        Bus.$emit('comment:deleted-'+this.question.id, comment)
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
                if( this.ownsComment(this.comment) ) {
                    this.form.body = this.comment.body
                    this.editing = !this.editing
                }
            }
        }
    }
</script>