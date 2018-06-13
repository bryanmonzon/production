<template>
    <div>
        <ul class="list-group" v-if="users.length > 0">
            <users-project-item 
                v-for="user in users" 
                :user="user" 
                :project="project"
                :key="user.id"
             />
        </ul>
        <div class="card-body" v-else>
            <p>Add users to this project.</p>
        </div>
    </div>
</template>

<script>
    import UsersProjectItem from './UsersProjectItem';
    export default {
        props: ['endpoint', 'project'],
        components: {
            UsersProjectItem
        },
        data() {
            return {
                users: []
            }
        },
        created() {
            let self = this
            this.fetchUsers()
            
            Bus.$on('user:added', function() {
                self.fetchUsers()
            });

            Bus.$on('user:removed', function() {
                self.fetchUsers()
            });
        },
        methods: {
            fetchUsers() {
                axios.get(this.endpoint)
                    .then( res => {
                        this.users = res.data
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>
