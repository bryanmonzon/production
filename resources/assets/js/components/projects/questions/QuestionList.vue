<template>
    <div class="list-group questions">
        <question-item v-for="question in questions" :question="question" :project-id="projectId" :key="question.id" />
    </div>
</template>

<script>
    import QuestionItem from './QuestionItem'

    export default {
        props: ['endpoint', 'projectId'],
        components: {
            QuestionItem
        },
        data() {
            return {
                questions: []
            }
        },
        created() {
            let self = this

            Echo.channel('projects.' + this.projectId)
                .listen('QuestionWasCreated', (e) => {
                    this.questions.unshift(e.question)
                    console.log(e.question)
                })
                .listen('QuestionWasDeleted', (e) => {
                    console.log(e)
                    this.removeQuestionFromData(e.questionId);
                })

            this.fetchQuestions()

            Bus.$on('question:added', function(){
                self.fetchQuestions()
            });

            Bus.$on('question:edited', function(){
                self.fetchQuestions()
            });

            Bus.$on('question:deleted', function(question){
                self.questions.splice(self.questions.indexOf(question), 1)
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
            },
            removeQuestionFromData(questionId) {
              this.questions = _.reject(this.questions, q => q.id == questionId)
            }
        }
    }
</script>
<style>
    .questions .list-group-item:first-child{
      border-top-right-radius: 0px;
      border-top-left-radius: 0px;
    }
</style>