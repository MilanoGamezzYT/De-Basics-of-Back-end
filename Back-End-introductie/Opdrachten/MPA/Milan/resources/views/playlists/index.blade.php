@extends("layouts.master")

@section("content")

<h1>Mijn Playlists</h1>

{{-- Toon opgeslagen playlists --}}
@foreach($playlists as $playlist)
    <p>
        <a href="{{ route('playlists.show', $playlist->id) }}">{{ $playlist->name }}</a> - {{$playlist->Songs->count()}} nummers
    </p>
@endforeach

@if(session()->has('temporary_playlist'))
    <h2>Tijdelijke Playlist</h2>
    @php
        $temporaryPlaylist = session('temporary_playlist');
    @endphp
    <p>
        <a href="{{ route('temporary-playlist.show') }}">
            <strong>{{ $temporaryPlaylist['name'] }}</strong> - {{ count($temporaryPlaylist['songs']) }} nummers
        </a>
    </p>
@endif

@endsection