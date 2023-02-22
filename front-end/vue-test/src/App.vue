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
            this.openForm = false;
            this.newMovie = { ...EMPTY_NEW_MOVIE };
            setTimeout(() => this.openForm = true, 0)
        },

        showFormEdit(movie) {
            this.openForm = false;
            this.newMovie = { ...movie };
            this.newMovie.tags = [];
            for (let x = 0; x < movie.tags.length; x++) {
                const tag = movie.tags[x];
                this.newMovie.tags.push(tag.id);
            }
            setTimeout(() => this.openForm = true, 0)
        },

        closeForm() {
            this.openForm = false;
        },

        addMovie(movie) {
            if ('id' in movie) {
                axios.post(apiUrl + 'movie/update/' + movie.id, movie)
                    .then(res => {
                        const data = res.data;
                        if (data.success) {
                            this.getMovies();
                        }
                    })
                    .catch(err => console.error(err));
            }

            else {
                axios.post(apiUrl + 'movie/store', movie)
                    .then(res => {
                        const data = res.data;
                        if (data.success) {
                            this.getMovies();
                        }
                    })
                    .catch(err => console.error(err));
            }
            this.openForm = false;
        },

        deleteMovie(movie) {
            axios.delete(apiUrl + 'movie/delete/' + movie.id)
                .then(res => {
                    const data = res.data;
                    if (data.success) {
                        this.getMovies();
                    }
                })
                .catch(err => console.error(err));
        },
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
    <button v-else @click="this.closeForm(), this.showFormCreate()">Add new Movie</button>
    <Index :movies='this.movies' :genres='this.genres' :tags='this.tags' @deleteMovie="deleteMovie"
        @editMovie="showFormEdit" />
</template>

<style scoped></style>
