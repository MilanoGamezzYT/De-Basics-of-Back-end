@foreach($genres as $genre)
    <a href="{{ route('songs.index', $genre->id) }}">{{ $genre->name }}</a>
@endforeach
