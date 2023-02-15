@extends('layouts.main_layout')

@section('content')
    <h3><a class="px-5" href="{{route('movie.create')}}">Add new movie</a></h3>
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
            <h3>
                <a href="{{route('movie.delete', $movie)}}" class="text-danger">Delete</a>&nbsp;
                <a href="{{route('movie.edit', $movie)}}" class="text-primary">edit</a>
            </h3>
            <hr>
        </section>
    @endforeach
@endsection