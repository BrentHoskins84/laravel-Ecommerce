import Vue from 'vue';
import VueRouter from 'vue-router';
import UsersComponent from "./components/UsersComponent";
import ExampleComponent from "./components/ExampleComponent";


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/admin/',
            name: 'Users',
            component: UsersComponent,
        },
        {
            path: '/users',
            name: 'test',
            component: ExampleComponent,
        }
    ],
    mode: 'history',
});


