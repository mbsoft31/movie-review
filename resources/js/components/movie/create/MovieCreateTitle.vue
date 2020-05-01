<template>
  <div class="entry-title">
    <input type="text" :value="title" @input="setTitle">
  </div>
</template>
<script>
    import {mapGetters, mapMutations} from "vuex";

    export default {
        name: 'movie-create-title',
        computed: {
            ...mapGetters('movie', ['title'])
        },
        methods: {
            ...mapMutations('movie', ['setTitle'])
        }
    }
</script>
