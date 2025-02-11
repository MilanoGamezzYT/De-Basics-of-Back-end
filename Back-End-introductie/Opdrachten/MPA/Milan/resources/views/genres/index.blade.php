@extends('layouts.master')

@section('content')

<h1>Alle Genres</h1>

<!-- Check of er genres zijn -->
@if($genres->isEmpty())
    <p>Er zijn geen genres beschikbaar.</p>
@else
    @foreach($genres as $genre)
    <p>
        <a href="{{ route('genre.show', $genre->id) }}">{{ $genre->name }}</a>
    </p>
    @endforeach
@endif

@endsection
