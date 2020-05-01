import {mapMutations} from "vuex";

require('../bootstrap');

import Vue from "vue";
import store from './store/index'
import './../../../node_modules/@fortawesome/fontawesome-free/css/all.min.css'
import {Tabs, Tab} from 'vue-tabs-component';
import VoerroTagsInput from '@voerro/vue-tagsinput';

// third party component
Vue.component('tabs', Tabs);
Vue.component('tab', Tab);
Vue.component('tags-input', VoerroTagsInput);

// my own components
Vue.component('movie-create-cover-picture', require('./../components/movie/create/MovieCreateCoverPicture').default)
Vue.component('movie-create-poster', require('./../components/movie/create/MovieCreatePoster').default)
Vue.component('movie-create-title', require('./../components/movie/create/MovieCreateTitle').default)
Vue.component('movie-create-details', require('./../components/movie/create/MovieCreateDetails').default)
Vue.component('movie-create-summary', require('./../components/movie/create/MovieCreateSummary').default)
Vue.component('movie-create-site-review', require('./../components/movie/create/MovieCreateSiteReview').default)
Vue.component('movie-create-media', require('./../components/movie/create/MovieCreateMedia').default)
//Vue.component('movie-create-info', require('./../components/movie/create/MovieCreateInfo').default)
Vue.component('image-upload', require('./../components/movie/create/ImageUpload').default)
Vue.component('video-upload', require('./../components/movie/create/VideoUpload').default)
Vue.component('media-manager', require('./../components/MediaManager').default)



const app = new Vue({
    store,
    el: '#app',
    async mounted() {
        await this.$store.dispatch('movie/getPeople');
        await this.$store.dispatch('movie/getCategories');
    },
    methods: {
        saveMovie() {
            this.$store.dispatch('movie/saveMovie');
        }
    }
});
