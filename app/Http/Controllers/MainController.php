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
}
