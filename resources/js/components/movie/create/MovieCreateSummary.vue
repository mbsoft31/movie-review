<template>
  <div class="border-t border-b-2 border-primary mt-8">
    <textarea placeholder="enter some summary"
              class="appearance-none w-full text-lg text-justify tracking-wide leading-relaxed py-8" rows="8"
              :value="summary" @input="setSummary"></textarea>
  </div>
</template>
<script>

    import {mapGetters, mapMutations} from "vuex";

    export default {
        name: 'movie-create-summary',
        computed: {
            ...mapGetters('movie', ['summary'])
        },
        methods: {
            ...mapMutations('movie', ['setSummary'])
        }
    }
</script>
