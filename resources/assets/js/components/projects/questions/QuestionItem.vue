<template>
    <div class="list-group-item" :class="{ 'unresolved': !question.resolved, 'bg-light resolved': question.resolved }">
      <div class="mw-100 text-muted d-flex justify-content-between align-items-center">
          <span class="d-flex flex-row align-items-center author-wrap">
            <img :src="question.user.avatar" class="question-avatar rounded-circle mr-2" /> 
            <span class="d-flex flex-column">
              <a href="#"><strong>{{ question.user.name }}</strong></a>
              <span style="font-size:.75rem;" class="font-italic">{{ question.created_at | datetime }}</span>
              <span style="font-size:.75rem;" class="font-italic"
                v-if="ownsQuestion(question)">
                <a href="#" 
                  @click.prevent="deleteQuestion(question)" 
                  class="text-muted"
                >Delete</a> or 
                <a href="#" 
                  class="text-muted" 
                  @click.prevent="toggleEdit"
                >Edit</a> Question
              </span>
            </span>
          </span>
          <resolve-question :question="question" />
      </div>
      <div class="w-100 lead py-4">
          <span :class="{'resolved': question.resolved}" @click.prevent="editing = true" v-if="!editing">{{question.question}}</span>
          <div v-else>
            <textarea class="form-control" @keydown.enter="updateQuestion" v-model="form.question">{{question.question}}</textarea>
            <span style="font-size:.75rem;" class="font-italic"><a href="#" class="text-muted" @click.prevent="editing = false">Cancel</a></span>
          </div>

      </div>
      <question-comments-list :endpoint="`/questions/${question.id}/comments`" :comments="question.comments" :question="question" />
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
        data() {
          return {
            form: {
              question: this.question.question
            },
            editing: false
          }
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
          ownsQuestion(question) {
            return user.id === question.user.id
          },
          deleteQuestion(question) {
            axios.delete(`/questions/${question.id}`)
              .then( res => {
                Bus.$emit('question:deleted', question);
              })
          },
          updateQuestion() {
            axios.patch(`/questions/${this.question.id}`, this.form)
              .then(res => {
                this.question.question = res.data.question
                this.editing = false
              })
          },
          toggleEdit() {
            return this.editing = !this.editing
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
    color: #9da6af !important;
    border-left: 3px solid #6c757d;
  }
  .unresolved {
    border-left:3px solid green;
  }
  .question-comments {
    margin-top:5px;
  }
  .comment-form {
    margin-top:10px;
  }
  img.question-avatar {
    height:30px;
    width:30px;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
  }
</style>