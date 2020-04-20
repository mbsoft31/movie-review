<template>
  <a class="play flex flex-col items-center" :data-video-id="getId">
    <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
      <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
      <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
    </svg>
    <h1 class="text-white text-3xl font-semibold mt-4">شاهد الفيديو الترويجي</h1>
  </a>
</template>
<script>
    import ModalVideo from 'modal-video'
    export default {
        name: 'main-header-play-trailer-icon',
        props: {
            videoId: {}
        },
        mounted() {
            this.openVideo()
        },
        methods: {
            openVideo(){
                new ModalVideo('.play', {channel: 'youtube'});
            }
        },
        computed: {
            getId() {
                let newval = null
                if (this.videoId.match(/(\?|&)v=([^&#]+)/)) {
                    newval = this.videoId.match(/(\?|&)v=([^&#]+)/)
                    return newval.pop()
                } else if (this.videoId.match(/(\.be\/)+([^\/]+)/)) {
                    newval = this.videoId.match(/(\.be\/)+([^\/]+)/)
                    return newval.pop()

                } else if (this.videoId.match(/(\embed\/)+([^\/]+)/)) {
                    newval = this.videoId.match(/(\embed\/)+([^\/]+)/)
                    return newval.pop().replace('?rel=0','')
                }
            }
        }
    }
</script>
<style lang="scss">
  @import '../../../node_modules/modal-video/scss/modal-video';
  .circle {
    stroke: #00BCD4;
    stroke-dasharray: 650;
    stroke-dashoffset: 650;
    -webkit-transition: all .9s ease-in-out;
    opacity: 0.6;
    fill: rgba(0, 0, 0, 0.6);
    fill-rule: nonzero;
    z-index: 5;
  }

  .play {
    -webkit-transition: all .9s ease;
  }

  .play svg {
    height: 100px;
    width: 100px;
  }

  .play .triangle {
    -webkit-transition: all .7s ease-in-out;
    stroke-dasharray: 240;
    stroke-dashoffset: 480;
    stroke: #fafafa;
    transform: translateY(0);
  }

  .play:hover .triangle {
    stroke-dashoffset: 0;
    opacity: 1;
    stroke: #00BCD4;
    z-index: 10;
  }

  .play:hover .circle {
    stroke-dashoffset: 0;
    opacity: 1;
  }
</style>
