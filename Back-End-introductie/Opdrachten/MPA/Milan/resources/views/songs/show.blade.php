@extends("layouts.master")

@section("content")
    <h1>Details van liedje: {{ $song->name }}</h1>
    <p><strong>Titel:</strong> {{ $song->name }}</p>
    <p><strong>Genre:</strong> {{ $song->genre->name }}</p>
    <p><strong>Artiest:</strong> {{ $song->artist }}</p>
    <p><strong>Releasedatum:</strong> {{ $song->created_at }}</p>

    <!-- Bereken de duur in minuten en seconden -->
    <p><strong>Lengte:</strong> {{ $durationInMinutes }} minuten en {{ $durationInSeconds }} seconden</p>

    <a href="{{ url('/songs') }}">Terug naar overzicht</a>
@endsection
