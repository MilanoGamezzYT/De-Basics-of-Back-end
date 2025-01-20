@extends('layouts.master')

@section('content')
    <h1>Maak een tijdelijke playlist</h1>

    <form action="{{ route('temporary-playlist.store') }}" method="POST">
        @csrf
        <label for="name">Naam van de playlist:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Opslaan</button>
    </form>
@endsection
