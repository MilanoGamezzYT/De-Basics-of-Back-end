@extends('layouts.master')

@section('content')
    <h1>Details van playlist: {{ $playlist->name }}</h1>

    <h2>Huidige nummers</h2>
    @foreach($playlist->songs as $song)
    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
        <a href="{{ route('songs.show', $song->id) }}">
            <strong>{{ $song->name }}</strong> - {{ $song->artist }}
        </a>
        <!-- Verwijderknop -->
        <form action="{{ route('playlists.songs.destroy', ['playlist' => $playlist->id, 'song' => $song->id]) }}" method="POST" style="margin: 0;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Verwijder</button>
        </form>
    </div>
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
