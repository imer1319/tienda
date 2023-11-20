import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
    {
        path: '/',
        name: 'home',
        component: require('./views/Home').default
    },
    {
        path: '/nosotros',
        name: 'about',
        component: require('./views/About').default
    },
    {
        path: '/carrito',
        name: 'cart',
        component: require('./views/Cart').default
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: require('./views/Checkout').default
    },
    {
        path: '/pedidos',
        name: 'sales',
        component: require('./views/Sales').default
    },
    {
        path: '/deudas',
        name: 'debts',
        component: require('./views/Debts').default
    },
    {
        path: '*',
        component: require('./views/404')
    }
    ],
    linkExactActiveClass: 'active',
    mode: 'history',
    scrollBehavior(){
        return {x:0, y:0}
    }
});
