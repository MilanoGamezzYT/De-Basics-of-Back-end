@extends("layouts.master")

@section("content")
<form action="genre/store" method="POST">
<label for="name">vul hier de naam in:</label>
<input type="text" name="genreName">
<input type="submit">
</form>
@endsection