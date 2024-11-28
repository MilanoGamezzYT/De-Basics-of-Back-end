@extends("layouts.master")

@section("content")
    <h1>Details van Song: {{ $song->title }}</h1>
    <p><strong>Titel:</strong> {{ $song->title }}</p>
    <p><strong>Artiest:</strong> {{ $song->artist }}</p>
    <p><strong>Releasedatum:</strong> {{ $song->created_at }}</p>
    <p><strong>Lengte:</strong> {{ $song->duration }} seconde</p>

    <a href="{{ url('/songs') }}">Terug naar overzicht</a>
@endsection
