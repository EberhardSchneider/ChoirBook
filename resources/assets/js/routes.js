import VueRouter from 'vue-router';

import Home from './components/Home/Home.vue';
import MyAccount from './components/MyAccount/MyAccount.vue';
import MyChoirs from './components/MyChoirs/MyChoirs.vue';
import EditChoir from './components/MyChoirs/Edit.vue';
import DetailChoir from './components/MyChoirs/Detail.vue';
import StoreSuccess from './components/Info/StoreSuccess.vue';



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
            path: '/choirs/edit/:id',
            component: EditChoir
        },
        {
            path: '/choirs/detail/:id',
            component: DetailChoir
        },
        {
            path: '/logout',
            component: Home
        },

        {
            path: '/store-success',
            component: StoreSuccess
        },
    ]
});