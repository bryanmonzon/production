<template>
    <div>
      <div class="w-100 pt-1 text-muted">
        <span>{{comments.length}} Comments</span>
      </div>
      
      <div class="list-group question-comments text-muted">
          <transition-group name="slide-fade">
            <question-comment-item v-for="comment in comments" :key="comment.id" :comment="comment" :question="question" />
          </transition-group>
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
              self.fetchComments()
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
<style>
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
</style>