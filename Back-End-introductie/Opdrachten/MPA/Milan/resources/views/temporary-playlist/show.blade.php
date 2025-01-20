@extends('layouts.master')

@section('content')
    <h1>Details van tijdelijke playlist: {{ session('temporary_playlist.name') }}</h1>

    @if(session('temporary_playlist'))
        
        @if(count(session('temporary_playlist.songs')) > 0)
            <h2>Huidige nummers</h2>
            @foreach(session('temporary_playlist.songs') as $songId)
                @php
                    $song = \App\Models\Song::find($songId);
                @endphp
                @if($song)
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                        <a href="{{ route('songs.show', $song->id) }}">
                            <strong>{{ $song->name }}</strong> - {{ $song->artist }}
                        </a>
                        <!-- Verwijderknop voor dit nummer uit de tijdelijke playlist -->
                        <form action="{{ route('temporary-playlist.remove-song', $song->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijder</button>
                        </form>
                    </div>
                @else
                    <p>Nummer niet gevonden. (Song ID: {{ $songId }})</p>
                @endif
            @endforeach
        @else
            <p>De playlist bevat nog geen nummers.</p>
        @endif

        <!-- Formulier voor het toevoegen van een nummer -->
        <form action="{{ route('temporary-playlist.add-song') }}" method="POST">
            @csrf
            <h2>Voeg een nummer toe aan deze playlist</h2>
            <select id="song_id" name="song_id" required>
                @foreach($songs as $song)
                    @if(!in_array($song->id, session('temporary_playlist.songs')))
                        <option value="{{ $song->id }}">{{ $song->name }} - {{ $song->artist }}</option>
                    @endif
                @endforeach
            </select>
            <button type="submit">Voeg nummer toe</button>
        </form>

        <!-- Formulier voor het verwijderen van de playlist -->
        <form action="{{ route('temporary-playlist.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Verwijder Playlist</button>
        </form>

        <!-- Formulier voor het opslaan van de playlist in de database -->
        <form action="{{ route('temporary-playlist.save') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Sla playlist op</button>
        </form>
    @else
        <p>Er is geen tijdelijke playlist aangemaakt.</p>
    @endif
@endsection
