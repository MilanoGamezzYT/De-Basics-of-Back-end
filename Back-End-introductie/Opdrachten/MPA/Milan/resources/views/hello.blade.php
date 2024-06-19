@extends("layouts.master")

@section("content")
<h1> dit is de content van de hello.blade </h1>
<p> dit is een paragraaf</p>
@endsection

@push("styles")
<style>
 p{
  color:red;
}
</style>
@endpush