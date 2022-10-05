require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import store from './store';

Vue.component('products-list', require('./components/ProductsList').default);
Vue.component('products-modal', require('./components/ProductsModal').default);
Vue.component('products-list-item', require('./components/ProductsListItem').default);
Vue.component('nav-bar', require('./components/NavBar').default);
Vue.component('footer-web', require('./components/Footer').default);

if (sessionStorage.getItem('cart')) {
    store.state.cart = JSON.parse(sessionStorage.getItem('cart'))
}

import auth from './mixins/auth';

Vue.mixin(auth);

window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store
});
