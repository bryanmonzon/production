<template>
    <div class="list-group-item pt-4">
      <div class="w-100 lead">
          {{question.question}}
      </div>
      <div class="mw-100 mt-2 pt-2 text-muted d-flex justify-content-between align-items-center">
          <span class="d-flex flex-row align-items-center">
            <img :src="question.user.avatar" style="height:30px; width:30px;" class="rounded-circle mr-2" /> 
            <span class="d-flex flex-column">
              <span>{{ question.user.name }}</span>
              <span style="font-size:.75rem;" class="font-italic">{{ question.created_at | datetime }}</span>
            </span>
          </span>
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