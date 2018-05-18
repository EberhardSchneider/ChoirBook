import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);


export default new Vuex.Store({

    state: {
        userId: -1,
        choirsMember: [],
        choirsAdmin: [],
        admins: [],
        news: [],
        loading: false
    },

    mutations: {
        updateChoirsMember: (state, choirs) => {
            console.log('Mutate choirs member.');
            state.choirsMember = choirs;
            console.log(state);
        },
        updateChoirsAdmin: (state, choirs) => {
            console.log('Mutate choirs admin.');
            state.choirsAdmin = choirs;
            console.log(state);
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
            state.admins = store.admins;
            state.news = store.news;
        }
    },

    getters: {
        isUserAdmin: state => choirId => {
            return state.choirsAdmin.filter(choir => choir.id === choirId).length > 0;
        },
        getAdmins: state => choirId => {

        }
    },

    actions: {

        getChoirs: context => {
            axios.get('/choirs/member')
                .then(response => {
                    context.commit('updateChoirsMember', response.data.choirs);
                });
            axios.get('/choirs/admin')
                .then(response => {
                    context.commit('updateChoirsAdmin', response.data.choirs);
                });
        },

        getAdmins() {
            this.state.choirsMember.map(
                choir => {
                    axios.get('/choir/admins')
                        .then(response => {
                            console.log(response);
                        });
                }
            );

        },

        getChoirsAdmin() {

        },

        getNews() {

        }
    }

});