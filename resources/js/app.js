require('./bootstrap');
require('alpinejs');

import Vue from 'vue';
import ExampleComponent from './components/ExampleComponents.vue';
import ProductAdd from './components/products/ProductAdd.vue';

// Register Vue components
Vue.component('example-component', ExampleComponent);
Vue.component('product-add', ProductAdd);
Vue.component('product-edit', ProductEdit);

import store from './store'
import ProductEdit from './components/products/ProductEdit.vue';
// Create and mount Vue instance
const app = new Vue({
    el: '#app',
    store
});
