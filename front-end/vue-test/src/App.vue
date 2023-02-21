<script>
import axios from 'axios';
import Index from './components/Index.vue'
import Form from './components/Form.vue'
const apiUrl = 'http://localhost:8000/api/v1/'
export default {
    data() {
        return {
            movies: [],
            genres: [],
            tags: [],
            openForm: false,
        }
    },
    components: {
        Index,
        Form,
    },

    methods: {
        showForm() {
            this.openForm = true;
        },

        closeForm() {
            this.openForm = false;
        }
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
    <div v-if='this.openForm'>
        <Form @CloseForm="closeForm()" />
    </div>
    <button v-else @click="this.showForm()">Add new Movie</button>
    <Index :movies='this.movies' :genres='this.genres' :tags='this.tags' />
</template>

<style scoped></style>
