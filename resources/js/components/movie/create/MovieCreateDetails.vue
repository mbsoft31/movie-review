<template>
  <div class="py-8 space-y-4">

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">release date</div>
      <div class="w-full">
        <input type="date" class="form-input" placeholder="01/01/2020" :value="releaseDate" @input="setReleaseDate">
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">runtime</div>
      <div class="w-full">
        <input type="text" class="form-input" placeholder="1h 30min" :value="runtime" @input="setRuntime">
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">categories</div>
      <div class="w-full">
        <tags-input
                placeholder="add a category"
                :value="categories"
                @input="setCategories"
                :existing-tags="allCategories"
                :typeahead="true"
                typeahead-style="dropdown"
        />
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">directors</div>
      <div class="w-full">
        <tags-input
                placeholder="add a person"
                :value="directors"
                @input="setDirectors"
                :existing-tags="allPeople"
                :typeahead="true"
                typeahead-style="dropdown"
        />
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">stars</div>
      <div class="w-full">
        <tags-input
                placeholder="add a person"
                :value="stars"
                @input="setStars"
                :existing-tags="allPeople"
                :typeahead="true"
                typeahead-style="dropdown"
        />
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">writers</div>
      <div class="w-full">
        <tags-input
                placeholder="add a person"
                :value="writers"
                @input="setWriters"
                :existing-tags="allPeople"
                :typeahead="true"
                typeahead-style="dropdown"
        />
      </div>
    </div>

    <div class="flex flex-col space-y-2">
      <div class="uppercase text-sm font-bold text-primary">producers</div>
      <div class="w-full">
        <tags-input
                placeholder="add a person"
                :value="producers"
                @input="setProducers"
                :existing-tags="allPeople"
                :typeahead="true"
                typeahead-style="dropdown"
        />
      </div>
    </div>

  </div>
</template>
<script>

    import {mapMutations, mapGetters} from "vuex";

    export default {
        name: 'movie-create-details',
        computed: {
            ...mapGetters('movie', [
                'categories',
                'allCategories',
                'stars',
                'allPeople',
                'writers',
                'producers',
                'directors',
                'releaseDate',
                'runtime',
            ]),
        },
        methods: {
            ...mapMutations('movie', [
                'setStars',
                'setCategories',
                'setWriters',
                'setProducers',
                'setDirectors',
                'setReleaseDate',
                'setRuntime',
            ]),
        }
    }
</script>
