<script>
import axios from 'axios';

export default {

  data() {
    return {
      movies: [],
    }
  },

  mounted() {

    axios.get('http://localhost:8000/api/v1/movie/all')
      .then(res => {

        const data = res.data;
        const success = data.success;
        this.movies = data.response;
      })
      .catch(err => console.error(err));
  }
};
</script>

<template><h2 v-for="movie in this.movies">{{ movie.name }}</h2></template>

<style scoped></style>
