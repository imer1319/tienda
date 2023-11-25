require('./bootstrap');

import Vue from 'vue';
import router from './routes';
import store from './store';
import auth from './mixins/auth';
import 'sweetalert2/dist/sweetalert2.min.css';
import swal from 'sweetalert2';
window.Swal = swal;

Vue.component('products-list-item', require('./components/ProductsListItem').default);
Vue.component('nav-bar', require('./components/NavBar').default);
Vue.component('footer-web', require('./components/Footer').default);

if (sessionStorage.getItem('cart')) {
    store.state.cart = JSON.parse(sessionStorage.getItem('cart'))
}


Vue.mixin(auth);

window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store
});
