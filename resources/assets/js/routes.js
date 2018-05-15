import VueRouter from 'vue-router';

import Home from './components/Home/Home.vue';
import MyAccount from './components/MyAccount/MyAccount.vue';



export default new VueRouter({
    mode: 'history',
    routes: [{
            path: '/home',
            component: Home
        },
        {
            path: '/my-account',
            component: MyAccount
        },
        {
            path: '/logout',
            component: Home
        },
    ]
});