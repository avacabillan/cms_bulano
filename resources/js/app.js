/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 
 import swal from 'sweetalert2';
 window.swal = swal;
 
 import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
 import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
 
 Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);
 
 Vue.component('new-arrivals', require('./components/NewArrivals.vue').default);
 
 
 const app = new Vue({
     el: '#app'
 });