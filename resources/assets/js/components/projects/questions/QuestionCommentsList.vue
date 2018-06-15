<template>
    <div>
      <div class="w-100 pt-1 text-muted">
        <span>{{comments.length}} Comments</span>
      </div>
      
      <div class="list-group question-comments text-muted">
        <question-comment-item v-for="comment in comments" :key="comment.id" :comment="comment" :question="question" />
      </div>
      
      <question-comment-form :question="question" />
    </div>
</template>
<script>
    import QuestionCommentForm from './QuestionCommentForm'
    import QuestionCommentItem from './QuestionCommentItem'

    export default {
        props: ['comments', 'question'],
        components: {
            QuestionCommentForm,
            QuestionCommentItem,
        },
    }
</script>