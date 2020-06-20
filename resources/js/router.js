import Vue from 'vue';
import VueRouter from 'vue-router';
import UsersComponent from "./components/UsersComponent";
import ExampleComponent from "./components/ExampleComponent";
import ProductInputComponent from "./components/ProductInputComponent";


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
        },
        {
            path: '/product',
            name: 'product',
            component: ProductInputComponent,
        }
    ],
    mode: 'history',
});


