import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);


export default new Vuex.Store({

    state: {
        userId: -1,
        choirsMember: [],
        choirsAdmin: [],
        news: [],
        loading: false
    },

    mutations: {
        updateChoirsMember: (state, choirs) => {
            console.log('Mutate choirs member.');
            console.log({
                choirs
            });
            state.choirsMember = choirs;
        },
        updateUserId: (state, id) => {
            state.userId = id;
        },
        setLoading: (state, loading) => {
            state.loading = loading;
        },
        init: state => {
            const store = window.store;

            state.userId = store.userId;
            state.choirsMember = store.choirsMember;
            state.choirsAdmin = store.choirsAdmin;
            state.news = store.news;
        }
    },

    getters: {
        isUserAdmin: state => choirId => {
            return state.choirsAdmin.filter(choir => choir.id === choirId).length > 0;
        }
    },

    actions: {
        getAllChoirsMember: context => {
            axios.get('/choirs/member')
                .then(data => {
                    context.commit('updateChoirsMember', data.data.choirs);
                });
        },

        getAllChoirAdmin() {

        },

        getNews() {

        }
    }

});