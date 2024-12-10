@extends("layouts.master")

@section("content")
<h1>Dit zijn alle liedjes</h1>

@foreach($songs as $song)
    <p>
        <a href="{{ route('songs.show', $song->id) }}">{{ $song->name }}</a> - {{ $song->artist }}
    </p>
@endforeach
@endsection
