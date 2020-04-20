require('../bootstrap');

import Vue from "vue";
import {Tabs, Tab} from 'vue-tabs-component';

Vue.component('tabs', Tabs);
Vue.component('tab', Tab);


/*
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
*/

const app = new Vue({
    el: '#app',
});
