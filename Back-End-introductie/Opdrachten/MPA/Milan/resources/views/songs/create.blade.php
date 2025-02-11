@extends('layouts.master')

@section('content')
<form action="{{ route('songs.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Title:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" required>
    </div>
    <div>
        <label for="duration">Length (in seconds):</label>
        <input type="number" id="duration" name="duration" required>
    </div>
    <div>
        <label for="genre">Genre:</label>
        <select id="genre" name="genre_id" required>
            <option value="">Select a genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Add Song</button>
</form>
@endsection
