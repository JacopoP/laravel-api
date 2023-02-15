@extends('layouts.main_layout')

@section('content')
    <form action="{{route('movie.store')}}" method="POST" class="px-5">
        @csrf
        <label class="label-control" for="name">Title</label>
        <input class="form-control" type="text" name="name">

        <label class="label-control" for="genre">Genre</label>
        <select class="form-select" name="genre">
            @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
            @endforeach
        </select>

        <label class="label-control" for="year">Release year</label>
        <input class="form-control" type="number" name="year">

        <label class="label-control" for="year">Cashout</label>
        <input class="form-control" type="number" name="cashOut">

        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag->id}}">
            <label class="label-control" for="tags[]">{{$tag->name}}</label><br>
        @endforeach

        <input type="submit" value="ADD NEW MOVIE">
    </form>
@endsection