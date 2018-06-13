<template>
    <div class="list-group">
      <div class="list-group-item pt-4" v-for="question in questions" :key="question.id">
        <div class="w-100 lead">
            {{question.question}}
        </div>
        <div class="mw-100 mt-2 pt-2 text-muted font-italic d-flex justify-content-between">
            <span>asked by {{ question.user.name }} - {{ question.created_at | datetime }}</span>
            <span>
                <label style="margin-bottom:0px;" :for="'question-'+question.id" class="text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                    <span class="mr-2">Resolve</span>
                    <input type="checkbox" :id="'question-'+question.id">
                </label>
            </span>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['endpoint'],
        data() {
            return {
                questions: []
            }
        },
        created() {
            let self = this
            this.fetchQuestions()

            Bus.$on('question:added', function(){
                self.fetchQuestions()
            });
        },
        methods: {
            fetchQuestions() {
                axios.get(this.endpoint)
                    .then( res => {
                        this.questions = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>