<template>
  <div class="py-4 flex items-start space-x-4 space-x-reverse">
    <img class="w-32 h-32 rounded shadow-md" :src="cover" v-if="cover != null">
    <div class="flex flex-col py-2">
      <label class="mb-2 text-lg font-semibold leading-relaxed tracking-wide">{{ name }}</label>
      <input class="flex-grow" type="file" ref="file" v-on:change="handleFileUpload">
    </div>
  </div>
</template>
<script>
    export default {
        name: 'image-upload',
        props:{
            name: {default: 'Image'},
            endpoint: {default: '/fileupload'}
        },
        data() {
            return {
                file: '',
                fileSrc: '',
                uploadPercentage: {
                    loaded: 0,
                    total: 1
                },
                cover: "https://via.placeholder.com/150",
            }
        },
        methods: {
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
                    vm.cover = res.data
                    vm.$emit('change', {fileurl: vm.cover})
                    console.log(res.data);
                })
                .catch(function (err) {
                    console.log('FAILURE!!');
                });
            },
        }
    }
</script>
