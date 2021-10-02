<template>
    <nav class="bg-white shadow-sm">
        <form ref="logoutForm" class="hidden" method="POST" action="/logout">
            <input name="_token" class="hidden" type="hidden" :value="csrfToken">
        </form>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
                    </div>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <router-link v-for="(navigationItem, index) in navigationItems" :key="index" :to="{ name: navigationItem.route }" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium" :class="{ 'border-indigo-500 text-gray-900 ': navigationItem.route === currentRouteName, 'border-transparent text-gray-500': navigationItem.route !== currentRouteName }" aria-current="page">
                            {{ navigationItem.label }}
                        </router-link>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="relative">
                        <div v-click-outside="() => profileMenuOpen = false">
                            <button @click.prevent="profileMenuOpen = ! profileMenuOpen" type="button" class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" :src="user.photo_url">
                            </button>
                        </div>

                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" :class="{ 'invisible': profileMenuOpen === false, 'visible': profileMenuOpen === true }" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a @click.prevent="signOut()" href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button @click.prevent="mobileMenuOpen = ! mobileMenuOpen" type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu" :class="{ 'hidden': mobileMenuOpen === false }">
            <div class="pt-2 pb-3 space-y-1">
                <router-link v-for="(navigationItem, index) in navigationItems" :key="'mobile-' + index" :to="{ name: navigationItem.route }" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium" :class="{ 'bg-indigo-50 border-indigo-500 text-indigo-700': navigationItem.route === currentRouteName, 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800': navigationItem.route !== currentRouteName }" aria-current="page">
                    {{ navigationItem.label }}
                </router-link>
            </div>
            <div class="pb-3 border-t border-gray-200 pt-4">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" :src="user.photo_url">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800">{{ user.name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ user.email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a @click.prevent="signOut()" href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { mapState } from 'vuex';
import vClickOutside from 'v-click-outside';

export default {
    name: 'AppNavigation',

    directives: {
        clickOutside: vClickOutside.directive
    },

    data() {
        return {
            profileMenuOpen: false,
            mobileMenuOpen: false,
            navigationItems: [
                {
                    route: 'home',
                    label: 'Home'
                }
            ],
        }
    },

    methods: {
        signOut() {
            this.$refs.logoutForm.submit();
        },
    },

    computed: {
        ...mapState(['user']),
        ...mapState('session', ['csrfToken']),

        currentRouteName() {
            return this.$route.name;
        },
    }
}
</script>
