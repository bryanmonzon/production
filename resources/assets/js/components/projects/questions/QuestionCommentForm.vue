<template>
    <div class="comment-form pb-3">
      <input type="text" 
        class="form-control rounded" 
        placeholder="Write a comment" 
        @keydown.enter="submitComment" 
        v-model="form.body">
    </div>
</template>
<script>
    export default {
        props: ['question'],
        data() {
            return {
                form: {
                    body: ''
                }
            }
        },
        methods: {
            submitComment() {
                axios.post(`/questions/${this.question.id}/comments`, this.form)
                    .then(res => {
                        this.form.body = ''
                        Bus.$emit('comment:added', res.data)
                    })
            }
        }
    }
</script>