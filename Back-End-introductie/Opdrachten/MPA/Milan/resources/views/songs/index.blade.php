@extends("layouts.master")

@section("content")
<h1>Dit zijn alle songs</h1>

@foreach($songs as $song)
    <p>{{ $song->title }} - {{ $song->artist }}</p>
@endforeach
@endsection
