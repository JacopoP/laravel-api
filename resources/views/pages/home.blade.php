@extends('layouts.main_layout')

@section('content')
    @foreach ($genres as $genre)    
        <section class="px-5">
            <h2>{{$genre->name}}</h2>
            <p>{{$genre->description}}</p>
            <ul>
                @foreach ($genre->movies as $movie)
                    <li>
                        <strong>{{$movie->name}}</strong> &nbsp;
                        @foreach($movie->tags as $tag)
                            #{{$tag->name}}&nbsp;
                        @endforeach
                    </li>
                @endforeach        
            </ul>
            <hr>
        </section>
    @endforeach
@endsection