import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        csrfToken: null,
        user: null,
    },

    actions: {
        getCsrfToken({ commit }) {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token && token.content) {
                commit('SET_CSRF_TOKEN', token.content);
            }
        },
        setUser({ commit }, user) {
            commit('SET_USER', user);
        },
    },

    mutations: {
        SET_CSRF_TOKEN(state, token) {
            state.csrfToken = token;
        },
        SET_USER(state, user) {
            state.user = user;
        },
    },

    strict: true,
});
