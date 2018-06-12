<template>
  <div class="modal" id="userPicker" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <form @submit.prevent>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Projects to this Plan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  
                  <div class="form-check" v-for="user in users" :key="user.id">
                    <input class="form-check-input" type="checkbox" :id='"user-"+user.id' :value="user.id" v-model="checkedUsers">
                    <label class="form-check-label" :for='"user-"+user.id'>
                      {{user.name}}
                    </label>
                  </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" @click="saveProjects" :disabled="checkedUsers.length === 0">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['planId', 'projectId'],
    data() {
      return {
        checkedUsers: [],
        users: []
      }
    },
    mounted() {

      this.fetchUsers()
      Bus.$on('showUsersProjectModal', function() {
        $('#userPicker').modal('show');
      })

    }, 
    methods: {
      fetchUsers() {
        axios.get('/users/all')
          .then( res => {
            this.users = res.data
          })
      },
      saveProjects() {
        
        axios.post('/plans/'+this.planId+'/projects/'+ this.projectId +'/users/add-users', {
            users: this.checkedUsers
          })
        .then(res => {
          Bus.$emit('user:added');
          $('#userPicker').modal('hide');
        })
      }
    }
  }
</script>