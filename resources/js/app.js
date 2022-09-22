require('./bootstrap');

import Vue from 'vue';
import router from './routes'
import store from './store';


// Vue.component('post-header', require('./components/PostHeader'));
Vue.component('products-list', require('./components/ProductsList').default);
Vue.component('products-list-item', require('./components/ProductsListItem').default);
Vue.component('nav-bar', require('./components/NavBar').default);
Vue.component('footer-web', require('./components/Footer').default);
// Vue.component('category-link', require('./components/CategoryLink'));
// Vue.component('tag-link', require('./components/TagLink'));
// Vue.component('post-link', require('./components/PostLink'));
// Vue.component('disqus-comments', require('./components/DisqusComments'));
// Vue.component('paginator', require('./components/Paginator'));
// Vue.component('pagination-links', require('./components/PaginationLinks'));
// Vue.component('social-links', require('./components/SocialLinks'));
// Vue.component('contact-form', require('./components/ContactForm'));


if (sessionStorage.getItem('cart')) {
    store.state.cart = JSON.parse(sessionStorage.getItem('cart'))
}

window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router,
    store
});
