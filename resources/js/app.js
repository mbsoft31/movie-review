require('./bootstrap');
import Vue from "vue";
import {Tabs, Tab} from 'vue-tabs-component';
import StarRating from 'vue-star-rating';
import VueTippy, { TippyComponent } from "vue-tippy";
import "tippy.js/themes/light.css";
Vue.use(VueTippy);
import './../../node_modules/@fortawesome/fontawesome-free/css/all.min.css'

// third party component
Vue.component("tippy", TippyComponent);
Vue.component('tabs', Tabs);
Vue.component('tab', Tab);
Vue.component('star-rating', StarRating);

// my own components
Vue.component('main-header-play-trailer-icon', require('./components/MainHeaderPlayTrailerIcon').default)
Vue.component('movie-video-item', require('./components/MovieVideoItem').default)
Vue.component('rating-form', require('./components/Rating/RatingForm').default)

/*
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
*/

const app = new Vue({
    //vuetify: vuetify,
    el: '#app',
    methods: {
        logout() {
            axios.post('/logout')
                .then( (res) => [
                    window.location = '/'
                ])
                .catch( (err) => {
                    console.error('Error logout', err)
                })
        }
    }
});
