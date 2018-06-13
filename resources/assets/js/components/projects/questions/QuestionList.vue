<template>
    <div class="list-group">
      <div class="list-group-item" v-for="question in questions" :key="question.id">
        <div class="d-flex justify-content-between">
            <span class="w-75">
                {{question.question}}
            </span>
            <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                <span class="mr-2">Mark as resolved</span>
                <input type="checkbox" id="question-1">
            </label>
        </div>
        <div class="mw-100 mt-2 border-top pt-2">
            posted by
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
                        console.log(res.data)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>