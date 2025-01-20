@extends("layouts.master")

@section("content")
    <h1>Hoi<h1>

<a href="{{ route('StoreFromSession') }}">Klik hier om toe te voegen</a>
<a href="{{ route('RemoveFromSession') }}">Klik hier om toe te verwijderen</a>
{{var_dump(session('name'))}}


@endsection