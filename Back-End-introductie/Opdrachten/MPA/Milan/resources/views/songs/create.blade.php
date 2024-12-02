@extends('layouts.master')

@section('content')
    <h1>Voeg hier nieuwe nummers toe</h1>
    <form action="{{ route('songs.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" required>
        </div>
        <div>
            <label for="album">Album:</label>
            <input type="text" id="album" name="album">
        </div>
        <div>
            <label for="duration">Lengte (in second ):</label>
            <input type="number" id="duration" name="duration" required>
        </div>
        <button type="submit">Add Song</button>
    </form>
@endsection
