<!-- resources/views/songs/create.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Add New Song</h1>
    <form method="POST" action="{{ route('songs.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        
        <label for="artist">Artist:</label>
        <input type="text" name="artist" id="artist" required>
        
        <label for="genre_id">Genre:</label>
        <select name="genre_id" id="genre_id" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        
        <button type="submit">Add Song</button>
</form>
