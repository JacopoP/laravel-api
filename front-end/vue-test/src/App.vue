<script>
import axios from 'axios';
import Index from './components/Index.vue'
const apiUrl = 'http://localhost:8000/api/v1/'
export default {
    data() {
        return {
            movies: [],
            genres: [],
            tags: []
        }
    },
    components: {
        Index,
    },

    mounted() {
        axios.get(apiUrl + 'movie/all')
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
    <Index :movies='this.movies' :genres='this.genres' :tags='this.tags' />
</template>

<style scoped></style>
