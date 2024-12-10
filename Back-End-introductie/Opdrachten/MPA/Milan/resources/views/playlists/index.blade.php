    @extends("layouts.master")

    @section("content")

    <h1>Mijn Playlists</h1>

    @foreach($playlists as $playlist)
        <p>
            <a href="{{ route('playlists.show', $playlist->id) }}">{{ $playlist->name }}</a> - {{$playlist->Songs->count()}} nummers
        </p>
    @endforeach

    @endsection
