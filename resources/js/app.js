require('./bootstrap');
require('./my');

window.Vue = require('vue').default;

Vue.component('Trus', require('./components/Trus.vue').default);
Vue.component('Roof', require('./components/Roof.vue').default);
Vue.component('RigelType', require('./components/RigelType.vue').default);
Vue.component('Photos', require('./components/Photos.vue').default);
Vue.component('Result', require('./components/Result.vue').default);
export const eventBus = new Vue();
const app = new Vue({
    el: '#app',
});
