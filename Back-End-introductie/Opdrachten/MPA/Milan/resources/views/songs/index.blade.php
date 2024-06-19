<!-- resources/views/songs/index.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Songs</h1>
    <a href="{{ route('songs.create') }}">Add New Song</a>
    <ul>
        @foreach($songs as $song)
            <li>
                <a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a> by {{ $song->artist }}
            </li>
        @endforeach
    </ul>
@endsection
