/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('./my');

window.Vue = require('vue').default;

Vue.component('Trus', require('./components/Trus.vue').default);
Vue.component('Roof', require('./components/Roof.vue').default);
Vue.component('RigelType', require('./components/RigelType.vue').default);
Vue.component('Photos', require('./components/Photos.vue').default);
Vue.component('Result', require('./components/Result.vue').default);

const app = new Vue({
    el: '#app',
});
