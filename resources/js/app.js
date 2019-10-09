/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueRouter from 'vue-router'
import lesson1 from './components/Lesson1Component.vue'
import lesson2 from './components/Lesson2Component.vue'
import lesson3 from './components/Lesson3Component.vue'
import lesson4 from './components/Lesson4Component.vue'
import lesson5 from './components/Lesson5Component.vue'
import lesson6 from './components/Lesson6Component.vue'
import example from './components/ExampleComponent.vue'
import Vuetify from 'vuetify'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios';

Vue.use(axios)
Vue.use(Vuetify)
Vue.use(BootstrapVue)
Vue.use(VueRouter)
Vue.use(VueSweetalert2);



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
Vue.component('navcard-component', require('./components/NavcardComponent.vue').default);
Vue.component('lesson1-component', require('./components/Lesson1Component.vue').default);
Vue.component('layout-component', require('./components/LayoutComponent.vue').default);
Vue.component('translate-component', require('./components/TranslateComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    { path: '/lesson1',component: lesson1 },
    { path: '/lesson2',component: lesson2 },
    { path: '/lesson3',component: lesson3 },
    { path: '/lesson4',component: lesson4 },
    { path: '/lesson5',component: lesson5 },
    { path: '/lesson6',component: lesson6 },
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router,
    el: '#app',
});
