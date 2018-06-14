<template>
    <span>
        <label style="margin-bottom:0px;" :for="'question-'+question.id" class="text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
            <span class="mr-2">Resolve</span>
            <input type="checkbox" :id="'question-'+question.id">
        </label>
    </span>
</template>
<script>
    export default {
        props: ['question']
    }
</script>