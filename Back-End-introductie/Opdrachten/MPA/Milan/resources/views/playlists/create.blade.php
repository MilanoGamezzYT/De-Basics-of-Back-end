@extends("layouts.master")

@section("content")
<h1>Maak hier nieuwe playlists aan</h1>

<form method="POST" action="{{ route('playlists.store') }}">
    @csrf
    <label for="name">Playlist naam:</label>
    <input type="text" id="name" name="name" required>

    <button type="submit">Opslaan</button>
</form>
@endsection
