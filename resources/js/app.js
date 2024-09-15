require('./bootstrap');
require('alpinejs');

import Vue from 'vue';
import ExampleComponent from './components/ExampleComponents.vue';

// Register Vue components
Vue.component('example-component', ExampleComponent);

// Create and mount Vue instance
const app = new Vue({
    el: '#app',
});
