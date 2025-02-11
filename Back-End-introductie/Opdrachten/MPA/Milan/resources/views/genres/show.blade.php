@extends('layouts.master')

@section('content')
    <h1>Details van Genre: {{ $genre->name }}</h1>

    <h2>Alle nummers</h2>
    @if($genre->songs->isEmpty())
        <p>Geen nummers gevonden in dit genre.</p>
    @else
        @foreach($genre->songs as $song)
            <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                <a href="{{ route('songs.show', $song->id) }}">
                    <strong>{{ $song->name }}</strong> - {{ $song->artist }}
                </a>
            </div>
        @endforeach
    @endif
@endsection
