<template>
    <div class="list-group-item pt-4" :class="{ 'unresolved': !question.resolved, 'bg-light': question.resolved }">
      <div class="w-100 lead">
          <span :class="{'resolved': question.resolved}">{{question.question}}</span>
      </div>
      <div class="mw-100 mt-2 pt-2 text-muted d-flex justify-content-between align-items-center">
          <span class="d-flex flex-row align-items-center">
            <img :src="question.user.avatar" style="height:30px; width:30px; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);" class="rounded-circle mr-2" /> 
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
        }, 
        created() {
          let self = this

          Bus.$on('question:resolved', function(data) {

            if( data.id == self.question.id ) {
              self.question.resolved = !self.question.resolved

            }
          })


        }
    }
</script>

<style>
  .resolved {
    text-decoration:line-through;
    color: #9da6af !important
  }
  .unresolved {
    border-top:3px solid green;
  }
</style>