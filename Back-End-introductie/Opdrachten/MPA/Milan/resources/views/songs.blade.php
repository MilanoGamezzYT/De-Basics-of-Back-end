<!-- resources/views/songs.blade.php -->

@extends("layouts.master")

@section("content")
<h1>Dit zijn alle songs</h1>

<form action="{{ route('songs.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="artist">Artist:</label>
        <input type="text" id="artist" name="artist" required>
    </div>
    <div>
        <label for="album">Album:</label>
        <input type="text" id="album" name="album">
    </div>
    <div>
        <label for="duration">Duration (in seconds):</label>
        <input type="number" id="duration" name="duration" required>
    </div>
    <button type="submit">Add Song</button>
</form>

<h2>All Songs</h2>
<ul>
    @foreach ($songs as $song)
        <li>{{ $song->title }} by {{ $song->artist }} from the album {{ $song->album }} ({{ gmdate("i:s", $song->duration) }})</li>
    @endforeach
</ul>
@endsection

@push("styles")
<style>
    p {
        color: blue;
    }
</style>
@endpush
