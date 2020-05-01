<template>
    <div class="hidden absolute inset-0 flex items-center justify-center" style="background-color: rgba(0,0,0,.35)">
        <div class="w-full h-128 mx-20 bg-white">
            <div class="flex bg-red-500 w-full h-full">
                <div class="w-1/4 "></div>
                <div class="flex-grow grid grid-cols-3 gap-2 overflow-y-scroll p-4">
                    <div v-for="(media,i) in allMedia" :key="i" class="block my-auto bg-white">
                        <div class="aspect-ratio-16/9 bg-cover" :style="mediaBackgroundUrl(media)"></div>
                    </div>
                    <div class="block my-auto bg-gray-500">
                        <div class="relative aspect-ratio-16/9 bg-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <label for="cover-pic"
                                       class="px-4 py-2 text-lg font-semibold leading-relaxed tracking-wider rounded border border-dashed border-primary cursor-pointer text-gray-100 hover:bg-primary-o-75">
                                    add new media
                                </label>
                                <input class="hidden w-1" type="file" id="cover-pic" v-on:change="handleUpload" ref="media_file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'media-manager',
        props: {
            medias: {default: []},
            publicPath: {default: '/storage/'}
        },
        mounted(){
            this.allMedia = this.medias
        },
        data() {
            return {
                allMedia: [],
                file: null,
                img_path: null,
                uploadPercentage: null,
            }
        },
        methods: {
            mediaBackgroundUrl(media){
                return `background-image: url("${ this.mediaPath(media) }")`
            },
            mediaPath(media){
                return this.publicPath + '/' + media.id + '/' + media.file_name
            },
            handleUpload(){
                this.img_path = null
                this.file = this.$refs.media_file.files[0];
                this.submitFile()
            },
            submitFile() {
                let formData = new FormData();
                formData.append('type', 'json');
                formData.append('file', this.file);
                console.log(formData.get('type'))
                let vm = this
                axios.post('/fileupload?json=1', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function( progressEvent ) {
                        vm.uploadPercentage = { loaded: progressEvent.loaded, total: progressEvent.total };
                    }.bind(vm),
                })
                    .then(function (res) {
                        let data = res.data;
                        vm.img_path = vm.mediaPath(data);
                        vm.allMedia.push(data)
                        console.log(res.data);
                    })
                    .catch(function (err) {
                        console.log('FAILURE!!');
                    });
            },
        },
        computed: {
            progress(){
                return this.uploadPercentage ?
                    this.uploadPercentage :
                    (this.uploadPercentage.loaded / this.uploadPercentage.total)*100
            },
        }
    }
</script>
