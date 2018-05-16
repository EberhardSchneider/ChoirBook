import VueRouter from 'vue-router';

import Home from './components/Home/Home.vue';
import MyAccount from './components/MyAccount/MyAccount.vue';
import MyChoirs from './components/MyChoirs/MyChoirs.vue';
import EditChoir from './components/MyChoirs/EditChoir.vue';




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
            path: '/my-choirs',
            component: MyChoirs
        },
        {
            path: '/edit-choir/:id',
            component: EditChoir
        },
        {
            path: '/logout',
            component: Home
        },
        {
            path: '/logout',
            component: Home
        },
    ]
});