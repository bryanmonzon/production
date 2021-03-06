
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
window.Bus = new Vue()

require('./filters')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('plans-list', require('./components/plans/PlansList.vue'))
Vue.component('new-plan', require('./components/plans/NewPlan.vue'))
Vue.component('projects-list', require('./components/projects/ProjectsList.vue'))
Vue.component('new-project', require('./components/projects/NewProject.vue'))
Vue.component('plan-projects-list', require('./components/plans/projects/PlanProjectsList.vue'))
Vue.component('add-projects-plan-button', require('./components/plans/projects/AddProjectsPlanButton.vue'))
Vue.component('add-projects-plan-modal', require('./components/plans/projects/AddProjectsPlanModal.vue'))

Vue.component('users-project-list', require('./components/plans/users/UsersProjectList.vue'))
Vue.component('add-users-project-button', require('./components/plans/users/AddUsersProjectButton.vue'))
Vue.component('add-users-project-modal', require('./components/plans/users/AddUsersProjectModal.vue'))

Vue.component('new-question', require('./components/projects/questions/NewQuestion.vue'))
Vue.component('question-list', require('./components/projects/questions/QuestionList.vue'))

Vue.component('new-concern', require('./components/projects/concerns/NewConcern.vue'))
Vue.component('concern-list', require('./components/projects/concerns/ConcernList.vue'))

Vue.component('my-tasks', require('./components/tasks/MyTasks.vue'))

const app = new Vue({
    el: '#app'
})
