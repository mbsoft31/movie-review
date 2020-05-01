<template>
  <div class="py-4 flex items-center space-x-4 space-x-reverse">
    <img class="w-32 h-32 rounded shadow-md" :src="fileSrc">
    <div class="flex-grow flex flex-col space-y-2">
        <div class="flex flex-col space-y-2">
            <label class="text-lg font-semibold leading-relaxed tracking-wide">Video Url</label>
            <input class="flex-grow text-area" type="text" :value="videoUrl" @input="videoUrlChanged">
        </div>
        <div class="flex flex-col space-y-2">
            <label class="text-lg font-semibold leading-relaxed tracking-wide">{{ name }}</label>
            <input class="flex-grow" type="file" ref="file" v-on:change="handleFileUpload">
        </div>
    </div>
  </div>
</template>
<script>
    export default {
        name: 'video-upload',
        props:{
            name: {default: 'Video thumbnail'},
            endpoint: {default: '/fileupload'}
        },
        data() {
            return {
                file: '',
                fileSrc: "https://via.placeholder.com/150",
                videoUrl: "",
                uploadPercentage: {
                    loaded: 0,
                    total: 1
                },
            }
        },
        methods: {
            videoUrlChanged(e) {
                this.videoUrl = e.target.value
                this.$emit('video-changed', {
                    videoUrl: this.videoUrl
                })
            },
            handleFileUpload(){
                this.cover = null
                this.file = this.$refs.file.files[0];
                this.submitFile()
            },
            submitFile: function () {
                let formData = new FormData();
                formData.append('file', this.file);
                let vm = this
                axios.post(this.endpoint, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        onUploadProgress: function( progressEvent ) {
                            let uploadPercentage = vm.uploadPercentage = { loaded: progressEvent.loaded, total: progressEvent.total };
                        }.bind(vm),
                    }
                ).then(function (res) {
                    vm.fileSrc = res.data
                    vm.$emit('thumb-changed', {
                        fileUrl: vm.fileSrc,
                    })
                    console.log(res.data);
                })
                .catch(function (err) {
                    console.log('FAILURE!!', err);
                });
            },
        }
    }
</script>
