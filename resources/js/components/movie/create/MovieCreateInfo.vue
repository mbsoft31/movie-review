<template>
    <div class="flex flex-col space-y-4">

        <main class="bg-white container">
            <div class="flex flex-row-reverse flex-wrap px-4 py-16">
                <div class="flex flex-col md:w-3/4 -px-4 px-4">

                    <movie-create-title/>

                    <movie-create-details/>

                    <movie-create-summary/>

                </div>
            </div>



        </main>

    </div>
</template>
<script>
    import {mapGetters, mapMutations} from "vuex";
    import MovieCreateMedia from "./MovieCreateMedia";
    import MovieCreateCoverPicture from "./MovieCreateCoverPicture";
    import MovieCreateDetails from "./MovieCreateDetails";
    import MovieCreateSummary from "./MovieCreateSummary";
    import MovieCreateTitle from "./MovieCreateTitle";
    import MovieCreatePoster from "./MovieCreatePoster";

    export default {
        components: {
            MovieCreatePoster,
            MovieCreateTitle, MovieCreateSummary, MovieCreateDetails, MovieCreateCoverPicture, MovieCreateMedia},
        async mounted() {
            await this.$store.dispatch('movie/getPeople');
        },
        data() {
            return {
                file: null,
                cover_img: null,
                poster_img: null,
                uploadPercentage: null,
                movie: {
                    cover: null,
                    poster: null,
                    trailer: {
                        thumb: null,
                        url: null,
                    }
                },
                search: '',
            }
        },
        computed:{
            ...mapGetters('movie',[
                'title',
                'summary',
                'site_review',
                'cover',
                'poster',
                'trailer',
                'stars',
                'allPeople',
                'writers',
                'producers',
                'directors',
            ]),
            progress(){
                return this.uploadPercentage ?
                    this.uploadPercentage :
                    (this.uploadPercentage.loaded / this.uploadPercentage.total)*100
            },
            coverBackground() {
                return this.cover_img ?
                    `background-image: url(${this.cover_img})` :
                    'background-color: #e2e8f0;'
            },
            posterBackground() {
                return this.poster_img ?
                    `background-image: url(${this.poster_img})` :
                    'background-color: #e2e8f0;'
            },
        },
        methods: {
            ...mapMutations('movie',[
                'setTitle',
                'setSummary',
                'setSiteReview',
                'setMovieMedia',
                'setStars',
                'setWriters',
                'setProducers',
                'setDirectors',
            ]),
            coverChanged(e){
                this.movie.cover = e.fileurl
                console.log('coverChanged', e.fileurl)
                this.setMovieMedia(this.movie)
            },
            posterChanged(e){
                this.movie.poster = e.fileurl
                console.log('posterChanged', e.fileurl)
                this.setMovieMedia(this.movie)
            },
            trailerThumbChanged(e){
                this.movie.trailer.thumb = e.fileUrl
                console.log('trailerThumbChanged', e.videoUrl)
                this.setMovieMedia(this.movie)
            },
            trailerUrlChanged(e){
                this.movie.trailer.url = e.videoUrl
                console.log('trailerUrlChanged', e.fileUrl)
                this.setMovieMedia(this.movie)
            },
            handleCoverUpload(){
                this.cover_img = null
                this.file = this.$refs.file1.files[0];
                this.submitCoverFile()
            },
            submitCoverFile: function () {
                let formData = new FormData();
                formData.append('file', this.file);
                let vm = this
                axios.post('/fileupload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        vm.uploadPercentage = { loaded: progressEvent.loaded, total: progressEvent.total };
                    }.bind(vm),
                })
                    .then(function (res) {
                        vm.cover_img = res.data
                        //vm.$emit('change', {fileurl: vm.cover_img})
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log('FAILURE!!');
                    });
            },
            handlePosterUpload(){
                this.poster_img = null
                this.file = this.$refs.file2.files[0];
                this.submitPosterFile()
            },
            submitPosterFile: function () {
                let formData = new FormData();
                formData.append('file', this.file);
                let vm = this
                axios.post('/fileupload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        vm.uploadPercentage = { loaded: progressEvent.loaded, total: progressEvent.total };
                    }.bind(vm),
                })
                    .then(function (res) {
                        vm.poster_img = res.data
                        //vm.$emit('change', {fileurl: vm.poster_img})
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log('FAILURE!!');
                    });
            },
            addStars(e) {
                console.log(e)
            }
        },
    }
</script>

<style>
    .text-area {
        @apply px-4 py-2 text-gray-900 text-lg rounded bg-gray-200;
    }
    .text-area:focus {
        @apply shadow-outline;
    }
</style>
