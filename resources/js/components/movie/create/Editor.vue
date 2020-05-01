<template>
  <textarea class="flex-grow text-area"
            name="summary"
            @input="onInput"
            :value="value"
            :rows="rows">
  </textarea>
</template>
<script>
    export default {
        name: 'editor',
        props: {
            value: {default: ''},
            rows: {default:3}
        },
        mounted() {
        },
        methods: {
            onInput(e) {
                this.$emit('input', e.target.value)
            }
        }
    }
</script>
<style>
  .text-area {
    @apply px-4 py-2 text-gray-900 text-lg rounded bg-gray-100;
  }

  .text-area:focus {
    @apply shadow-outline;
  }
</style>
