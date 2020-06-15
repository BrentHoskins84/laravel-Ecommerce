import Vue from 'vue';
import router from './router';
import DashboardHome from "./components/DashboardHome";

require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {
        DashboardHome,
    },
    router
});

