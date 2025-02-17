@extends("layouts.master")

@section("content")

<h1>Mijn Playlists</h1>

{{-- Controleer of de gebruiker is ingelogd --}}
@if(Auth::check())
    @if($playlists->isEmpty())
        <p>Er zijn geen playlists beschikbaar.</p>
    @else
        {{-- Toon opgeslagen playlists van de ingelogde gebruiker --}}
        @foreach($playlists as $playlist)
            <p>
                <a href="{{ route('playlists.show', $playlist->id) }}">{{ $playlist->name }}</a> - {{ $playlist->songs->count() ?? 0 }} nummers
            </p>
        @endforeach
    @endif
@else
    <p>Je moet ingelogd zijn om je playlists te bekijken.</p>
@endif

{{-- Toon tijdelijke playlist als deze bestaat --}}
@if(session()->has('temporary_playlist'))
    <h2>Tijdelijke Playlist</h2>
    @php
        $temporaryPlaylist = session('temporary_playlist');
    @endphp
    <p>
        <a href="{{ route('temporary-playlist.show') }}">
            <strong>{{ $temporaryPlaylist['name'] }}</strong> - {{ count($temporaryPlaylist['songs'] ?? []) }} nummers
        </a>
    </p>
@endif

@endsection
