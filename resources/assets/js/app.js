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

Vue.component('example', require('./components/Example.vue'));
// Vue.component('Article-Edit', require('./components/Article/Edit.vue'));
// Vue.component('article-Create', require('./components/Article/Create.vue'))
// Vue.component('article-Show', require('./components/Article/Show.vue'));
// Vue.component('article-Delete', require('./components/Article/Delete.vue'));
// Vue.component('article-All', require('./components/Article/All.vue'));


const app = new Vue({
    el: '#app'
});