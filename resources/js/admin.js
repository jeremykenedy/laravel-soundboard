/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import jQuery from 'jquery'
import Popper from 'popper.js/dist/umd/popper.js';

window._ = require('lodash')

require('bootstrap/js/dist/util')
// require('bootstrap/js/src/dropdown')
require('bootstrap-notify')

try {
  global.$ = global.jQuery = require('jquery')
} catch (e) {}

window.Popper = Popper;
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
const token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

window.Vue = require('vue')
Vue.use(BootstrapVue)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default)
Vue.component('sounds-component', require('./components/SoundsComponent.vue').default)
Vue.component('audio-player', require('./components/AudioPlayer.vue').default)
Vue.component('sound-loader', require('./components/SoundLoader.vue').default)
Vue.component('nav-bar', require('./components/NavBar.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// eslint-disable-next-line
const app = new Vue({
  el: '#app'
})
