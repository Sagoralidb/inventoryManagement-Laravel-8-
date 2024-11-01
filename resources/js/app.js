require('./bootstrap');
require('alpinejs');

import Vue from 'vue';
import ExampleComponent from './components/ExampleComponents.vue';
import ProductAdd from './components/products/ProductAdd.vue';
import StockManage from './components/stocks/StockManage.vue';
import ReturnProduct from './components/return_products/ReturnProduct.vue';

// Register Vue components
Vue.component('example-component', ExampleComponent);
Vue.component('product-add', ProductAdd);
Vue.component('product-edit', ProductEdit);
Vue.component('stock-manage', StockManage);
Vue.component('return-product',ReturnProduct);


import store from './store'
import ProductEdit from './components/products/ProductEdit.vue';
// Create and mount Vue instance
const app = new Vue({
    el: '#app',
    store
});
