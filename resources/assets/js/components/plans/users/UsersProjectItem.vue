<template>
    <li class="list-group-item list-group-item-action d-flex">
        <span class="mr-auto p-2">
            {{user.name}}
        </span>
        <span class="p-2">
            <button class="btn btn-secondary" @click="removeUser">Remove</button>
        </span>
    </li>
</template>

<script>
    export default {
        props: ['user', 'project'],
        methods: {
            removeUser() {
                axios.delete('/projects/'+JSON.parse(this.project).id+'/users/'+this.user.id )
                    .then(res => {
                        Bus.$emit('user:removed')
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>