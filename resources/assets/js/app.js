
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

window.Vue = require('vue').default;

import Switches from 'vue-switches'
import Notifications from 'vue-notification'
import VModal from 'vue-js-modal'
import Print from 'vue-print-nb'



Vue.use(VModal);
Vue.use(Notifications);
Vue.component('switches', Switches);
Vue.use(Print);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('view-users', require('./components/users/ViewUsers.vue').default);
Vue.component('add-user', require('./components/users/CreateUser.vue').default);
Vue.component('change-password', require('./components/users/ChangePassword.vue').default);

Vue.component('view-students', require('./components/students/ViewStudents.vue').default);
Vue.component('add-student', require('./components/students/CreateStudents.vue').default);
Vue.component('edit-students', require('./components/students/EditStudents.vue').default);


Vue.component('view-departments', require('./components/departments/ViewDepartments.vue').default);
Vue.component('add-department', require('./components/departments/CreateDepartment.vue').default);
Vue.component('edit-departments', require('./components/departments/EditDepartment.vue').default);

Vue.component('view-types', require('./components/user_type/ViewTypes.vue').default);
Vue.component('add-type', require('./components/user_type/CreateType.vue').default);

Vue.component('view-courses', require('./components/courses/ViewCourses.vue').default);
Vue.component('add-course', require('./components/courses/CreateCourse.vue').default);
Vue.component('edit-courses', require('./components/courses/EditCourses.vue').default);
// Vue.component('course-registration-session', require('./components/results/createResult.vue').default);
Vue.component('session-create', require('./components/session/CreateSession.vue').default);
Vue.component('session-index', require('./components/session/ViewSession.vue').default);
Vue.component('session-edit', require('./components/session/EditSession.vue').default);

// Session
Vue.component('new-registration', require('./components/course-registration/NewRegistration.vue').default);
Vue.component('view-registration', require('./components/course-registration/ViewRegistration.vue').default);

Vue.component('create-result', require('./components/results/createResult.vue').default);
;
Vue.component('view-result', require('./components/results/ViewResult.vue').default);
Vue.component('edit-result', require('./components/results/EditResult.vue').default);
Vue.component('student-view-result', require('./components/results/ViewResultForStudent.vue').default);

Vue.component('view-professors', require('./components/professors/ViewProfessors.vue').default);
Vue.component('add-professor', require('./components/professors/CreateProfessor.vue').default);
Vue.component('edit-professors', require('./components/professors/EditProfessor.vue').default);

Vue.component('view-admin', require('./components/admins/ViewAdmin.vue').default);
Vue.component('add-admin', require('./components/admins/CreateAdmin.vue').default);
Vue.component('edit-admins', require('./components/admins/EditAdmin.vue').default);




const app = new Vue({
    el: '#app'
});
