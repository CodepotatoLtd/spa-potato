require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router/routes';
import store from './store/index';

window.Vue = Vue;

Vue.use(VueRouter);

// Let's register our application's components.

Vue.component('app-navigation', require('./components/Partials/AppNavigation').default);

// Now let's boot up Vue Router, this will be the heart of our SPA.

const router = new VueRouter({
    routes,
});

// Turn the lights on.

let app = new Vue({
    router,
    store,
    el: '#app',
    created() {
        this.$store.dispatch('getCsrfToken');

        const appState = window.appState;

        if (appState.user) {
            this.$store.dispatch('setUser', appState.user);
        }
    },
});
