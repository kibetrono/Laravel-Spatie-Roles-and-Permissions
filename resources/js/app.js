require('./bootstrap');

// import Vue from 'vue'

window.Vue=require('vue');

window.Fire= new Vue();

// import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { vue } from 'laravel-mix';

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

vue.component('role',require('./components/role.vue').default)
const app=new Vue(
    {
        el:'#app'
    }
)