<template>
  <div class="modal" id="projectPicker" tabindex="-1" role="dialog">
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
                  
                  <div class="form-check" v-for="project in projects" :key="project.id">
                    <input class="form-check-input" type="checkbox" :id='"project-"+project.id' :value="project.id" v-model="checkedProjects">
                    <label class="form-check-label" :for='"project-"+project.id'>
                      {{project.name}}
                    </label>
                  </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" @click="saveProjects">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['planId'],
    data() {
      return {
        checkedProjects: [],
        projects: []
      }
    },
    mounted() {
      this.fetchProjects()

      Bus.$on('showProjectsPlanModal', function() {
        $('#projectPicker').modal('show');
      })

    }, 
    methods: {
      fetchProjects() {
        axios.get('/projects/all')
          .then( res => {
            this.projects = res.data
          })
      },
      saveProjects() {
        
        axios.patch('/plans/'+this.planId+'/projects/add-projects', {
            projects: this.checkedProjects
          })
        .then(res => {
          Bus.$emit('project:added');
          $('#projectPicker').modal('hide');
        })
      }
    }
  }
</script>