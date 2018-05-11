/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store({

    state: {
        activeScreenId: 0
    },

    mutations: {
        changeScreenId(state, id) {
            state.activeScreenId = id;
        }
    }

});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const Home = Vue.component('Home', require('./components/home/Index.vue'));

const Test = {
    template: `<div>Test</div>`
};

const Test1 = {
    template: `<div>Hallo</div>`
}

const Test2 = {
    template: `<div>Bla42</div>`
}

const routes = [{
        path: '/home',
        component: Home
    },
    {
        path: '/my-account',
        component: Test
    },
    {
        path: '/logout',
        component: Home
    },
];

const router = new VueRouter(routes);

Vue.component('toolbar', require('./components/Toolbar.vue'));

const app = new Vue({
    el: '#app',
    store,
    router,
    compnents: {
        Home
    },
    template: `
        <div class="app">
            <home/>
        </div>
    `
});