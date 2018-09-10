
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('search', require('./components/Layout/Search.vue'));
Vue.component('navbar', require('./components/Layout/Navbar.vue'));
Vue.component('news', require('./components/Layout/News.vue'));
Vue.component('footer-section', require('./components/Layout/Footer.vue'));
Vue.component('products', require('./components/Products.vue'));
Vue.component('shop', require('./components/Shop.vue'));
Vue.component('shop-menu', require('./components/ShopMenu.vue'));

// 
Vue.component('admin-navbar', require('./components/Admin/Layout/AdminNavbar.vue'));
Vue.component('admin-products', require('./components/Admin/ProductList.vue'));
Vue.component('edit-product', require('./components/Admin/EditProduct.vue'));

const app = new Vue({
    el: '#app'
});
