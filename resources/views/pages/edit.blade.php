@extends('layouts.main_layout')

@section('content')
    <form action="{{route('movie.save', $movie)}}" method="POST" class="px-5">
        @csrf
        <label class="label-control" for="name">Title</label>
        <input class="form-control" type="text" name="name" value="{{$movie->name}}">

        <label class="label-control" for="genre">Genre</label>
        <select class="form-select" name="genre">
            @foreach($genres as $genre)
                <option 
                    value="{{$genre->id}}"
                    @if ($genre->id == $movie->genre->id)
                        selected
                    @endif
                >
                    {{$genre->name}}
                </option>
            @endforeach
        </select>

        <label class="label-control" for="year">Release year</label>
        <input class="form-control" type="number" name="year" value="{{$movie->year}}">

        <label class="label-control" for="year">Cashout</label>
        <input class="form-control" type="number" name="cashOut" value="{{$movie->cashOut}}">

        @foreach ($tags as $tag)
            <input 
                type="checkbox" name="tags[]" value="{{$tag->id}}"
                @foreach ($movie->tags as $mtag)
                    @if ($mtag->id == $tag->id)
                        checked                        
                    @endif
                @endforeach
            >
            <label class="label-control" for="tags[]">{{$tag->name}}</label><br>
        @endforeach

        <input type="submit" value="SAVE MOVIE">
    </form>
@endsection