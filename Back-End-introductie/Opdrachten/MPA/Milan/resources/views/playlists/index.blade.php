@extends("layouts.master")

@section("content")

<h1>Mijn Playlists</h1>

@foreach($playlists as $playlist)
    <p>{{ $playlist->name }} - {{$playlist->Songs->count()}} </p>
@endforeach

@endsection

