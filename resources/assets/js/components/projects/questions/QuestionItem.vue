<template>
    <div class="list-group-item pt-4">
      <div class="w-100 lead">
          {{question.question}}
      </div>
      <div class="mw-100 mt-2 pt-2 text-muted font-italic d-flex justify-content-between">
          <span>asked by {{ question.user.name }} - {{ question.created_at | datetime }}</span>
          <resolve-question :question="question" />
      </div>
    </div>
</template>

<script>
    import ResolveQuestion from './ResolveQuestion'
    export default {
        props: ['question'],
        components: {
          ResolveQuestion
        }
    }
</script>