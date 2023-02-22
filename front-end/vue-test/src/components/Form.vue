<script>
import axios from 'axios';
export default {
    props: [
        'newMovieP',
        'tags',
        'genres',
    ],
    data() {
        return {
            newMovie: this.newMovieP,
        }
    },
}
</script>

<template>
    <section>
        <form>
            <label for="name">Title</label>
            <input type="text" name="name" v-model="this.newMovie.name">

            <label for="genre">Genre</label>
            <select name="genre" v-model="this.newMovie.genre_id">
                <option v-for="genre in this.genres" :value="genre.id">{{ genre.name }}</option>
            </select>

            <label for="year">Release year</label>
            <input type="number" name="year" v-model="this.newMovie.year">

            <label for="year">Cashout</label>
            <input type="number" name="cashOut" v-model="this.newMovie.cashOut">

            <div v-for="tag in this.tags">
                <input type="checkbox" name="tags[]" :value="tag.id" v-model="this.newMovie.tags">
                <label for="tags[]">{{ tag.name }}</label><br>
            </div>

            <input type="submit" value="ADD NEW MOVIE" @click.prevent="$emit('addMovie', this.newMovie)">
            <input type="submit" value="Cancel" @click.prevent="$emit('closeForm', this.newMovie)">
        </form>
    </section>
</template>

<style scoped></style>