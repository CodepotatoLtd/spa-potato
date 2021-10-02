export default {
    state: {
        csrfToken: null,
        flashData: {},
    },

    getters: {
        hasFlash: (state) => (key) => {
            return state.flashData[key] !== undefined
        },
        getFlash: (state) => (key) => {
            if (state.flashData[key] === undefined) {
                return null;
            }

            return state.flashData[key];
        }
    },

    actions: {
        captureCsrfToken({ commit }) {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token && token.content) {
                commit('SET_CSRF_TOKEN', token.content);
            }
        },
        setSessionFlashData({ commit }, data) {
            commit('SET_SESSION_FLASH_DATA', data);
        }
    },

    mutations: {
        SET_CSRF_TOKEN(state, token) {
            state.csrfToken = token;
        },
        SET_SESSION_FLASH_DATA(state, data) {
            state.flashData = data;
        }
    },

    namespaced: true,
}
