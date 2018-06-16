<template>
    <li class="list-group-item list-group-item-action d-flex">
        <span class="mr-auto p-2">
            <img :src="user.avatar" class="user-avatar rounded-circle mr-2 text-muted"/>
            {{user.name}}
        </span>
        <span class="p-2">
            <button class="btn btn-sm btn-outline-secondary" @click="removeUser"><i class="far fa-minus-circle"></i> Remove</button>
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

<style>
    .user-avatar {
        height: 20px;
        width: 20px;
    }
</style>