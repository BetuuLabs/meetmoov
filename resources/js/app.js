
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import DisableAutocomplete from 'vue-disable-autocomplete';
Vue.use(DisableAutocomplete);

import VueFlatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
Vue.use(VueFlatPickr);

import wysiwyg from "vue-wysiwyg";
import "vue-wysiwyg/dist/vueWysiwyg.css";
Vue.use(wysiwyg, {
    //iconOverrides: { "bold": "<i class='your-custom-icon'></i>" }
    hideModules: { "image": true, "code": true , "table": true, "separator": true, 'removeFormat' : true},
    image: {
        uploadURL: "/upload/image",
        dropzoneOptions: {}
    },
    maxHeight: "400px",
    forcePlainTextOnPaste: true
}); // config is optional. more below

/*
    Auth components
 */
Vue.component('login', require('./components/auth/Login.vue'));
Vue.component('register', require('./components/auth/Register.vue'));


/*
    Event Components
 */
Vue.component('event-create', require('./components/event/CreateEvent'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
