/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap.js');
require ('admin-lte/plugins/jquery-ui/jquery-ui.min');
require ('selectize');
global.moment = require ('moment/moment');
require ('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js');
require ('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
require ('admin-lte/dist/js/adminlte.js');
require ('./search_patient');
require('./calendar_dashboard');
require('admin-lte/dist/js/demo');
require('admin-lte//plugins/ekko-lightbox/ekko-lightbox.min.js');
require ('admin-lte/plugins/filterizr/jquery.filterizr.min.js');
require('admin-lte/plugins/datatables/jquery.dataTables.min.js');
require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
require('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js');
require('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
