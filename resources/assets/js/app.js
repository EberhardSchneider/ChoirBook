/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import axios from 'axios';

import router from './routes.js';

Vue.use(Vuetify);
Vue.use(VueRouter);

import store from './store';


axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Index = Vue.component('index', require('./components/Index.vue'));

// define filters

Vue.filter('formatDate', function (date) {
    var options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric"
    };
    return new Date(date).toLocaleDateString("de-DE", options);
})


// instanciate Vue object


const app = new Vue({
    el: '#app',
    store,
    router,
    components: {
        Index
    },
    template: `
        <div class="app">
            <index/>
        </div>
    `,
    created: function () {
        store.commit('init');
    }
});