require('./bootstrap');
require('alpinejs');

import Vue from 'vue';
import ExampleComponent from './components/ExampleComponents.vue';
import ProductAdd from './components/products/ProductAdd.vue';

// Register Vue components
Vue.component('example-component', ExampleComponent);
Vue.component('product-add', ProductAdd);

import store from './store'
// Create and mount Vue instance
const app = new Vue({
    el: '#app',
    store
});
