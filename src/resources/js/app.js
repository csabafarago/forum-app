/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

window.Vue = require('vue');

Vue.component('filter-component', require('./components/FilterComponent.vue').default);
Vue.component('vote-component', require('./components/VoteComponent.vue').default);

Vue.mixin({
    methods: {
        vote: (post_id, csrf) => {
            axios.post('/vote/' + post_id, {token: csrf})
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        }
    }
})

const app = new Vue({
    el: '#app',
});
