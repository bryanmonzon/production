<template>
    <div>
      <div class="w-100 pt-1 text-muted">
        <span>{{comments.length}} Comments</span>
      </div>
      
      <div class="list-group question-comments text-muted">
        <div class="list-group-item" :class="{ 'bg-light': question.resolved }" v-for="comment in comments" :key="comment.id">
          <div class="d-flex flex-column">
            <span><strong>{{comment.user.name}}</strong> {{comment.body}}</span>
            <span style="font-size:.75rem;">{{comment.user.created_at | datetime}}</span>
          </div>
        </div>
      </div>
      
      <question-comment-form :question="question" />
    </div>
</template>
<script>
    import QuestionCommentForm from './QuestionCommentForm'

    export default {
        props: ['comments', 'question'],
        components: {
            QuestionCommentForm
        }
    }
</script>