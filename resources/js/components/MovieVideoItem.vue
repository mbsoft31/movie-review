<template>
    <div>
        <a class="videos-item" :class="`item-${this.videoId}`"
           :data-video-id="videoId"
        >
            <svg x="0px" y="0px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                <circle class="circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"></circle>
                <polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1"></polygon>
            </svg>
            <slot></slot>
        </a>
    </div>
</template>
<script>
    import ModalVideo from 'modal-video'

    export default {
        name: 'movie-video-item',
        props: {
            id: {},
            url: {},
        },
        data() {
            return {
                videoId: '',
            }
        },
        mounted() {
            this.openVideo()
        },
        methods: {
            openVideo() {
                this.videoId = this.initVideoId()
                new ModalVideo(`.item-${this.videoId}`, {channel: 'youtube'});
            },
            initVideoId() {
                let newval = null
                if (this.url.match(/(\?|&)v=([^&#]+)/)) {
                    newval = this.url.match(/(\?|&)v=([^&#]+)/)
                    return newval.pop()
                } else if (this.url.match(/(\.be\/)+([^\/]+)/)) {
                    newval = this.url.match(/(\.be\/)+([^\/]+)/)
                    return newval.pop()

                } else if (this.url.match(/(\embed\/)+([^\/]+)/)) {
                    newval = this.url.match(/(\embed\/)+([^\/]+)/)
                    return newval.pop().replace('?rel=0', '')
                }
            }
        }
    }
</script>
<style lang="scss">
    @import "../../../node_modules/modal-video/scss/modal-video";
    .videos-item {
        @apply relative flex justify-center items-center;
        -webkit-transition: all .9s ease;

        img {
            @apply relative;
            &::before{
                @apply absolute w-full h-full bg-black z-50;
            }
        }

        svg {
            @apply absolute w-12 h-12 z-50;
            .circle {
                stroke: theme('colors.primary');
                stroke-dasharray: 650;
                stroke-dashoffset: 650;
                -webkit-transition: all .9s ease-in-out;
                opacity: 0.6;
                fill: rgba(0, 0, 0, 0.6);
                fill-rule: nonzero;
                z-index: 5;
            }
            .triangle {
                -webkit-transition: all .7s ease-in-out;
                stroke-dasharray: 240;
                stroke-dashoffset: 480;
                stroke: #fafafa;
                transform: translateY(0);
            }
        }
        &:hover {
            .triangle {
                stroke-dashoffset: 0;
                opacity: 1;
                stroke: theme('colors.primary');
                z-index: 10;
            }
            .circle {
                stroke-dashoffset: 0;
                opacity: 1;
            }
        }
    }
</style>
