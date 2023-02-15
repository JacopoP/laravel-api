<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;
use App\Models\Tag;
use App\Models\Movie;

class MainController extends Controller
{
    public function home(){
        $genres=Genre::all();
        $tags=Tag::all();
        $movies=Movie::all();
        return view('pages.home', compact(['genres', 'tags', 'movies']));
    }

    public function movieHome(){
        $genres=Genre::all();
        $tags=Tag::all();
        $movies=Movie::all();
        return view('pages.movies', compact(['genres', 'tags', 'movies']));
    }

    public function movieCreate(){
        $genres=Genre::all();
        $tags=Tag::all();
        return view('pages.create', compact(['genres', 'tags']));
    }

    public function movieStore(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'genre' => 'required|integer|max:20',
            'year' => 'required|integer|min:1900|max:2023',
            'cashOut' => 'nullable|integer',
            'tags' => 'array'
        ]);

        $movie = Movie::make($data);
        $genre = Genre::find($data['genre']);
        $movie->genre()->associate($genre);
        $movie->save();

        $tags = Tag::find($data['tags']);
        $movie->tags()->attach($tags);

        return redirect()->route('movie.home');
    }

    public function movieDelete(Movie $movie){
        $movie->tags()->sync([]);
        $movie->delete();

        return redirect()->route('movie.home');
    }
}
