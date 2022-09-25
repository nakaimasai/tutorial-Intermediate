import './bootstrap';
window.Vue = require('vue');

import StarRating from 'vue-star-rating';
import Vue from 'vue';

Vue.component('star-rating', StarRating);
Vue.component('my-component', require('./components/app.vue').default);

const stars = new Vue({
    el: '#app',
    
});

import VueStarRating from 'vue-star-rating'

const app = createApp(App)
app.component('star-rating', VueStarRating) 