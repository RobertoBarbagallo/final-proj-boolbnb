/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');


 window.Vue = require('vue');
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
//  const files = require.context('./', true, /\.vue$/i)
//  files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
Vue.component('delete-button', require('./components/DeleteButton.vue').default);
Vue.component('my-maps', require('./components/MyMaps.vue').default);
Vue.component('guest-search', require('./components/GuestSearch.vue').default);
Vue.component('structures-sponsored', require('./components/StructuresSponsored.vue').default);
Vue.component('show-messages-button', require('./components/ShowMessagesButton.vue').default);
Vue.component('create-messages-button', require('./components/CreateMessagesButton.vue').default);
Vue.component('created-message-pop-up', require('./components/CreatedMessagePopUp.vue').default);




 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
//  Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });
