<script>
export default {

  data() {
    return {

    }
  },
  props: [
    'movies',
    'genres',
    'tags'
  ],
};
</script>

<template>
  <section>
    <div v-for="movie in this.movies" :key="movie.id">
      <h2>{{ movie.name }}</h2>
      <h3>{{ movie.genre.name }}</h3>
      <ul>
        <li v-for="tag in movie.tags">
          {{ tag.name }}
        </li>
      </ul>
      <button @click="$emit('deleteMovie', movie)">DELETE</button>
      <hr>
    </div>
  </section>
</template>

<style scoped>
ul {
  padding: 3px 15px;
}
</style>
