<template>
    <div>
      <div class="w-100 pt-1 text-muted">
        <span>{{comments.length}} Comments</span>
      </div>
      
      <div class="list-group question-comments text-muted">
        <div v-for="comment in comments" :key="comment.id">
          <question-comment-item :comment="comment" :question="question" />
        </div>
      </div>
      
      <question-comment-form :question="question" />
    </div>
</template>
<script>
    import QuestionCommentForm from './QuestionCommentForm'
    import QuestionCommentItem from './QuestionCommentItem'

    export default {
        props: ['question', 'endpoint'],
        data() {
          return {
            comments: []
          }
        },
        components: {
            QuestionCommentForm,
            QuestionCommentItem,
        },
        created() {
          let self = this
          this.fetchComments()

          Bus.$on('comment:added', function(comment) {
              // console.log(comment)
              self.comments.push(comment)
          })

          Bus.$on('comment:deleted', function(comment) {
            self.comments.splice(self.comments.indexOf(comment), 1)
          })
        },
        methods: {
          fetchComments() {
            axios.get(this.endpoint)
              .then(res => {
                this.comments = res.data
              })
              .catch(err => {
                console.log(err)
              })
          }
        }
    }
</script>


