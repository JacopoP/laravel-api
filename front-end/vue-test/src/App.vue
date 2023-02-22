<script>
import axios from 'axios';
import Index from './components/Index.vue'
import Form from './components/Form.vue'
const apiUrl = 'http://localhost:8000/api/v1/';
const EMPTY_NEW_MOVIE = {
    tags: [],
}
export default {
    data() {
        return {
            movies: [],
            genres: [],
            tags: [],
            openForm: false,
            newMovie: {},
        }
    },
    components: {
        Index,
        Form,
    },

    methods: {
        getMovies() {
            axios.get(apiUrl + 'movie/all')
                .then(res => {

                    const data = res.data;
                    const success = data.success;
                    this.movies = data.movies;
                })
                .catch(err => console.error(err));
        },

        showFormCreate() {
            this.newMovie = { ...EMPTY_NEW_MOVIE };
            this.openForm = true;
        },

        closeForm() {
            this.openForm = false;
        },

        addMovie(movie) {
            this.openForm = false;
            console.log(movie)
            axios.post(apiUrl + 'movie/store', movie)
                .then(res => {
                    const data = res.data;
                    if (data.success) {
                        this.getMovies();
                    }
                })
                .catch(err => console.error(err));
        }
    },

    mounted() {
        axios.get(apiUrl + 'all')
            .then(res => {

                const data = res.data;
                const success = data.success;
                this.movies = data.response.movies;
                this.genres = data.response.genres;
                this.tags = data.response.tags;
            })
            .catch(err => console.error(err));
    }
}
</script>

<template>
    <div v-if='this.openForm'>
        <Form @closeForm="closeForm()" @addMovie="addMovie" :tags="this.tags" :genres="this.genres"
            :newMovieP="this.newMovie" />
    </div>
    <button v-else @click="this.showFormCreate()">Add new Movie</button>
    <Index :movies='this.movies' :genres='this.genres' :tags='this.tags' />
</template>

<style scoped></style>
