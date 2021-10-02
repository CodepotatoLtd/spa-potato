import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import session from './modules/session';

export default new Vuex.Store({
    modules: {
        session
    },

    state: {
        user: null,
    },

    actions: {
        setUser({ commit }, user) {
            commit('SET_USER', user);
        },
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
        },
    },

    strict: true,
});
