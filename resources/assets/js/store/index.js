import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);


export default new Vuex.Store({

    state: {
        userId: -1,
        choirsMember: [],
        choirsAdmin: [],
        loading: false
    },

    mutations: {
        updateChoirsMember(state, choirs) {
            console.log('Mutate choirs member.');
            state.choirsMember = choirs;
        },
        setLoading(state, loading) {
            state.loading = loading;
        },
        init() {
            this.dispatch('getAllChoirsMember')
        }
    },

    getters: {},

    actions: {
        getAllChoirsMember(context) {
            const state = context.state;
            if (state.userId === -1) {
                axios.get('/user/id')
                    .then(id => {
                        state.userId = id;
                        axios.get('/choirs/member/' + state.userId)
                            .then(data => {
                                state.choirsMember = data.choirs;
                            });
                    })

            } else {
                axios.get('/choirs/member/' + state.userId)
                    .then(data => {
                        state.choirsMember = data.choirs;
                    });
            }

        },

        getAllChoirAdmin() {

        },

        getNews() {

        }
    }

});