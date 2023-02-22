<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

class ApiController extends Controller
{
    public function getAll() {
        $movies = Movie :: with(['tags', 'genre'])->orderBy('created_at', 'desc') -> get();
        $genres = Genre::all();
        $tags = Tag::all();
        return response() -> json([
            'success' => true,
            'response' => [
                'movies' => $movies,
                'genres' => $genres,
                'tags' => $tags,
            ],
        ]);
    }

    public function movieAll() {
        $movies = Movie :: with(['tags', 'genre'])->orderBy('created_at', 'desc') -> get();
        return response() -> json([
            'success' => true,
            'movies' => $movies,
        ]);
    }

    public function movieStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'genre_id' => 'required|integer|max:20',
            'year' => 'required|integer|min:1900|max:2023',
            'cashOut' => 'nullable|integer',
            'tags' => 'nullable|array'
        ]);

        $movie = Movie::make($data);
        $genre = Genre::find($data['genre_id']);
        $movie->genre()->associate($genre);
        $movie->save();

        $tags = Tag::find($data['tags']);
        $movie->tags()->attach($tags);

        return response() -> json([
            'success' => true,
        ]);
    }

    public function movieDelete(Movie $movie){
        $movie->tags()->sync([]);
        $movie->delete();

        return response() -> json([
            'success' => true,
        ]);
    }
}
