@extends('layouts.master')

@section('content')
    <h1>Details van playlist: {{ $playlist->name }}</h1>

    <h2>Huidige nummers</h2>
    @foreach($playlist->songs as $song)
        <p>
            <a href="{{ route('songs.show', $song->id) }}">
                <strong>{{ $song->name }}</strong> - {{ $song->artist }}
            </a>
        </p>
    @endforeach

    @php
        // Omrekeningen van seconden naar minuten en seconden
        $totalMinutes = floor($totalDuration / 60); // Aantal volledige minuten
        $totalSeconds = $totalDuration % 60; // Rest van de seconden
    @endphp

    <h3>Totale duur: {{ $totalMinutes }} minuten en {{ $totalSeconds }} seconden</h3> <!-- Toont de totale duur -->

    <h2>Voeg een nummer toe aan deze playlist</h2>
    <form action="{{ route('playlists.addSong', $playlist->id) }}" method="POST">
        @csrf
        <label for="song_id">Selecteer een nummer:</label>
        <select id="song_id" name="song_id" required>
            @foreach($songs as $song)
                <option value="{{ $song->id }}">{{ $song->name }} - {{ $song->artist }}</option>
            @endforeach
        </select>
        <button type="submit">Toevoegen</button>
    </form>
@endsection
