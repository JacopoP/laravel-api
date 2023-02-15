<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Genre;
use App\Models\Tag;
use App\Models\Movie;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory()->count(100)->make()->each(function($m){
            $genre = Genre::inRandomOrder()->first();
            $m->genre()->associate($genre);
            $m->save();

            $tags = Tag::inRandomOrder()->limit(rand(1,5))->get();
            $m->tags()->attach($tags);
        });
    }
}
