
require('./bootstrap');
import vuetify from './vuetify';

window.Vue = require('vue').default;
import BootstrapVue from 'bootstrap-vue' //Importing
Vue.use(BootstrapVue) // Telling Vue to use this in whole application

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-su', require('./components/Header.vue').default);


import VueRuter from 'vue-router'
Vue.use(VueRuter)

const About = require('./components/About/About.vue').default;
const NotFound = require('./components/NotFound.vue').default;
const App = require('./components/app.vue').default;
const Update = require('./components/EditData.vue').default;

import Notifications from 'vue-notification'

Vue.use(Notifications)

import 'vuejs-noty/dist/vuejs-noty.css'
import VueNoty from 'vuejs-noty'
Vue.use(VueNoty, {
    timeout: 2000,
    progressBar: true,
    layout: 'topCenter'
  })

const routes = [
    {
        name: 'about',
        path:'/anjing',
        component: About
    },
    {
        path:'*',
        component: NotFound
    },{
        name: 'utama',
        path: '/',
        component: App
    },
    {
        path:'/about/:name?',
        component: About,
        props: true,
    },
    {
        name: 'editData',
        path: '/edit/:id?',
        component: Update,
        props: true,
    }
    
]

const router = new VueRuter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    vuetify,
    router,
});
