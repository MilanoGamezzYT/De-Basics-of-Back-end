@extends('layouts.master')

@section('content')
    <h1>Wijzig Playlist Naam</h1>

    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" value="{{ $playlist->name }}" required>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('playlists.index') }}">Terug naar playlists</a>
@endsection
