<template>
    <div class="border-t border-b-2 border-primary mt-8">
    <textarea placeholder="site review goes here"
              class="appearance-none w-full text-lg text-justify tracking-wide leading-relaxed py-8" :rows="rows"
              :value="siteReview" @input="setSiteReview"></textarea>
    </div>
</template>
<script>

    import {mapGetters, mapMutations} from "vuex";

    export default {
        name: 'MovieCreateSiteReview',
        props: {
            rows: { default: 10 }
        },
        computed: {
            ...mapGetters('movie', ['siteReview'])
        },
        methods: {
            ...mapMutations('movie', ['setSiteReview'])
        }
    }
</script>
