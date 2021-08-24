
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Dropzone = require('dropzone');
window.CodeMirror = require('codemirror');
window.CodeMirror = require('codemirror');
require('codemirror/mode/css/css');
require('codemirror/mode/javascript/javascript');
require('codemirror/mode/htmlmixed/htmlmixed');

Dropzone.options.dropzone = {
    previewsContainer: '.dropzone-previews',
    acceptedFiles: 'image/*,text/html'
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the project. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
