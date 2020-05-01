
const movieStore = {
    strict: true,
    namespaced: true,
    state: {
        title: 'untitled movie',
        summary: '',
        categories: [],
        cover: null,
        poster: null,
        trailer: null,
        releaseDate: '',
        runtime: '',
        siteReview: '',
        stars: [],
        writers: [],
        producers: [],
        directors: [],
        gallery: [],
        videos: [],
        allPeople: [],
        allCategories: []
    },
    getters: {
        title: (state)=> {
            return state.title
        },
        summary: (state)=> {
            return state.summary
        },
        categories: (state) => {
            return state.categories
        },
        releaseDate: (state) => {
            return state.releaseDate
        },
        runtime: (state) => {
            return state.runtime
        },
        siteReview: (state)=> {
            return state.siteReview
        },
        cover: (state)=> {
            return state.cover
        },
        poster: (state)=> {
            return state.poster
        },
        trailer: (state)=> {
            return state.trailer
        },
        stars: (state) => {
            return state.stars
        },
        writers: (state) => {
            return state.writers
        },
        producers: (state) => {
            return state.producers
        },
        directors: (state) => {
            return state.directors
        },
        allPeople: (state) => {
            return state.allPeople.map((item, i, arr) => {
                return {key:i,value:item.name}
            });
        },
        allCategories: (state) => {
            return state.allCategories.map((item, i, arr) => {
                return {key:i,value:item.name}
            });
        },
    },
    mutations: {
        setTitle: (state, e) => {
            state.title = e.target.value
        },
        setSummary: (state, e) => {
            state.summary = e.target.value
        },
        setCategories: (state, categories) => {
            state.categories = categories
        },
        setReleaseDate: (state, e) => {
            state.releaseDate = e.target.value
        },
        setRuntime: (state, e) => {
            state.runtime = e.target.value
        },
        setSiteReview: (state, e) => {
            state.siteReview = e.target.value
        },
        setCover: (state, cover) => {
            state.cover = cover
        },
        setPoster: (state, poster) => {
            state.poster = poster
        },
        setTrailer: (state, trailer) => {
            state.trailer = trailer
        },
        setStars: (state, stars) => {
            state.stars = stars
        },
        setWriters: (state, writers) => {
            state.writers = writers
        },
        setProducers: (state, producers) => {
            state.producers = producers
        },
        setDirectors: (state, directors) => {
            state.directors = directors
        },
        addStar: (state, star) => {
            state.stars.push(star);
        },
        setAllPeople: (state, people) => {
            state.allPeople = people
        },
        setAllCategories: (state, categories) => {
            state.allCategories = categories
        },
    },
    actions: {
        getPeople: async ({ commit, state }) => {
            await axios.post('/people')
                .then(function (res) {
                    commit('setAllPeople', res.data)
                    //console.log(res.data);
                })
                .catch(function (err) {
                    console.log('FAILURE!!');
                });
        },
        getCategories: async ({ commit, state }) => {
            await axios.post('/categories/json')
                .then(function (res) {
                    commit('setAllCategories', res.data)
                })
                .catch(function (err) {
                    console.log('getCategories ==> FAILURE!!');
                });
        },
        saveMovie: ({commit, state}) => {
            let movie = {
                title: state.title,
                summary: state.summary,
                categories: state.categories.map((el,i,arr) => el.value),
                cover: state.cover,
                poster: state.poster,
                trailer: state.trailer,
                releaseDate: state.releaseDate,
                runtime: state.runtime,
                siteReview: state.siteReview,
                stars: state.stars.map((el,i,arr) => el.value),
                writers: state.writers.map((el,i,arr) => el.value),
                producers: state.producers.map((el,i,arr) => el.value),
                directors: state.directors.map((el,i,arr) => el.value),
                gallery: state.gallery,
                videos: state.videos
            }
            axios.post('/dashboard/movie/store', movie)
                .then((res) => {
                    console.log(res.data)
                    window.location = '/explore/movie/' + res.data.slug
                })
                .catch((err) => {
                    console.error(err)
                })
        }
    }
}

export default movieStore

