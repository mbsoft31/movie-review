<template>
    <div class="relative h-full bg-cover" :style="posterBackground">
        <div class="flex flex-col items-center justify-center h-full">
            <label for="poster-pic"
                   class="px-4 py-2 space-x-reverse space-x-2 text-base font-semibold leading-relaxed tracking-wider rounded border border-dashed border-primary cursor-pointer hover:bg-primary-o-75 bg-primary-o-25">
                <i class="fas fa-image fa-lg text-gray-200"></i>
                <span>Select a Poster</span>
            </label>
            <input class="hidden w-1" type="file" id="poster-pic" @change="handlePosterUpload" ref="poster">
            <span>{{ progress }} %</span>
        </div>
    </div>
</template>
<script>
    import {mapGetters, mapMutations} from "vuex";
    export default {
        name: 'movie-create-poster',
        data() {
            return {
                posterFile: null,
                uploadPercentage: null,
            }
        },
        computed: {
            ...mapGetters('movie', [
                'poster'
            ]),
            posterBackground() {
                return this.poster != null ?
                    `background-image: url(${this.poster})` :
                    'background-color: #e2e8f0;'
            },
            progress(){
                return this.uploadPercentage == null ?
                    0 :
                    parseFloat( "" + ( ( this.uploadPercentage.loaded / this.uploadPercentage.total ) * 100 ) )
            },
        },
        methods: {
            ...mapMutations('movie', [
                'setPoster',
            ]),
            handlePosterUpload() {
                this.setPoster(null)
                this.posterFile = this.$refs.poster.files[0];
                this.submitPoster()
            },
            submitPoster: function () {
                let formData = new FormData();
                formData.append('file', this.posterFile);
                let vm = this
                axios.post('/fileupload', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function (progressEvent) {
                        vm.uploadPercentage = {loaded: progressEvent.loaded, total: progressEvent.total};
                    }.bind(vm),
                })
                    .then(function (res) {
                        vm.setPoster(res.data)
                    })
                    .catch(function (err) {
                        vm.setPoster(null)
                        console.log('Upload ==> FAILURE!!');
                    });
            },
        }
    }
</script>
