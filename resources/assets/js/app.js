
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('admin-save-product', require('./components/Admin/SaveProduct.vue'));
Vue.component('admin-products', require('./components/Admin/ProductList.vue'));
Vue.component('admin-save-category', require('./components/Admin/SaveCategory.vue'));
Vue.component('admin-categories', require('./components/Admin/CategoryList.vue'));
Vue.component('admin-packages', require('./components/Admin/PackageList.vue'));
Vue.component('admin-save-package', require('./components/Admin/SavePackage.vue'));
Vue.component('admin-package-info', require('./components/Admin/PackageInfo.vue'));
Vue.component('admin-stocks', require('./components/Admin/Stock.vue'));

Vue.component('client-products', require('./components/Client/ProductListHome.vue'));
Vue.component('shop', require('./components/Shop.vue'));
Vue.component('shop-menu', require('./components/ShopMenu.vue'));
Vue.component('products', require('./components/Products.vue'));
Vue.component('footer-section', require('./components/Layout/Footer.vue'));
Vue.component('news', require('./components/Layout/News.vue'));
Vue.component('search', require('./components/Layout/Search.vue'));
Vue.component('navbar', require('./components/Layout/Navbar.vue'));


const app = new Vue({
    el: '#app'
});
