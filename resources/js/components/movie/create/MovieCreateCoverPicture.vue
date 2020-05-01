<template>
    <div class="main-header relative w-full h-128 bg-cover flex items-center justify-center" :style="coverBackground">
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <label for="cover-pic"
                   class="px-4 py-2 space-x-reverse space-x-2 text-lg font-semibold leading-relaxed tracking-wider rounded border border-dashed border-primary cursor-pointer hover:bg-primary-o-75 bg-primary-o-25">
                <i class="fas fa-image fa-lg text-gray-200"></i>
                <span>Click to select a cover picture</span>
            </label>
            <input class="hidden w-1" type="file" id="cover-pic" @change="handleCoverUpload" ref="file">
            <span>{{ progress }} %</span>
        </div>
    </div>
</template>
<script>
    import {mapGetters, mapMutations} from "vuex";

    export default {
        name: 'movie-create-cover-picture',
        data() {
            return {
                file: null,
                uploadPercentage: null,
            }
        },
        computed: {
            ...mapGetters('movie', [
                'cover'
            ]),
            coverBackground() {
                return this.cover != null ?
                    `background-image: url(${this.cover})` :
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
                'setCover',
            ]),
            handleCoverUpload() {
                this.setCover(null)
                this.file = this.$refs.file.files[0];
                this.submitCover()
            },
            submitCover: function () {
                let formData = new FormData();
                formData.append('file', this.file);
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
                    vm.setCover(res.data)
                })
                .catch(function (err) {
                    vm.setCover(null)
                    console.log('Upload ==> FAILURE!!');
                });
            },
        }
    }
</script>

