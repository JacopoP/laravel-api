@extends('layouts.main_layout')

@section('content')
    @foreach ($movies as $movie)    
        <section class="px-5">
            <h2>{{$movie->name}}</h2>
            <h4>{{$movie->year}}</h4>
            <h3>{{$movie->genre->name}}</h3>
            @isset($movie->cashOut)   
                <p>Cashout: {{$movie->cashOut}}$</p>
            @endisset
            <h3>Tags</h3>
            <ul>
                @foreach ($movie->tags as $tag)
                    <li>
                        <h4>{{$tag->name}}</h4>
                        <p>{{$tag->description}}</p>
                    </li>
                @endforeach        
            </ul>
            <hr>
        </section>
    @endforeach
@endsection