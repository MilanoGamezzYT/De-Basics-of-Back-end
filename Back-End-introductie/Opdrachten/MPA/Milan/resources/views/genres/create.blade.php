@extends("layouts.master")

@section("content")
<h1>Genres</h1>
<form action="store" method="POST">
<label for="name">vul hier de naam in:</label>
<input type="text" name="genreName">
<input type="submit">
</form>
@endsection