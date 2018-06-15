<template>
    <div class="list-group-item" :class="{ 'unresolved': !question.resolved, 'bg-light': question.resolved }">
      <div class="mw-100 text-muted d-flex justify-content-between align-items-center">
          <span class="d-flex flex-row align-items-center author-wrap">
            <img :src="question.user.avatar" style="height:30px; width:30px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);" class="rounded-circle mr-2" /> 
            <span class="d-flex flex-column">
              <a href="#"><strong>{{ question.user.name }}</strong></a>
              <span style="font-size:.75rem;" class="font-italic">{{ question.created_at | datetime }} <span v-if="ownsQuestion">• <a href="#" @click.prevent="deleteQuestion" class="text-muted">Delete Question</a></span></span>
            </span>
          </span>
          <resolve-question :question="question" />
      </div>
      <div class="w-100 lead py-4">
          <span :class="{'resolved': question.resolved}">{{question.question}}</span>
      </div>
      <question-comments-list :comments="question.comments" :question="question" />
    </div>
</template>

<script>
    import ResolveQuestion from './ResolveQuestion'
    import QuestionCommentsList from './QuestionCommentsList'
    export default {
        props: ['question'],
        components: {
          ResolveQuestion,
          QuestionCommentsList
        },
        created() {
          let self = this

          Bus.$on('question:resolved', function(data) {
            if( data.id == self.question.id ) {
              self.question.resolved = !self.question.resolved
            }
          })
        },
        methods: {
          ownsQuestion() {
            return user.id === this.question.user_id
          },
          deleteQuestion() {
            axios.delete(`/questions/${this.question.id}`)
              .then( res => {
                Bus.$emit('question:deleted');
              })
          }
        }
    }
</script>

<style>
  .author-wrap {
    line-height: 1rem;
  }
  .resolved {
    text-decoration:line-through;
    color: #9da6af !important
  }
  .unresolved {
    border-top:3px solid green;
  }
  .question-comments {
    margin-top:5px;
  }
  .comment-form {
    margin-top:10px;
  }
</style>