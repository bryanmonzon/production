<template>
    <div class="list-group">
        <question-item v-for="question in questions" :question="question" :key="question.id" />
    </div>
</template>

<script>
    import QuestionItem from './QuestionItem'

    export default {
        props: ['endpoint'],
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
            this.fetchQuestions()

            Bus.$on('question:added', function(){
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
            }
        }
    }
</script>