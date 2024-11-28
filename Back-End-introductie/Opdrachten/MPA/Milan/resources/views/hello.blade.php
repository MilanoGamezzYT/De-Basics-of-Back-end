@extends("layouts.master")

@section("content")

<h1>Welkom op de Jukebox Home Pagina</h1>
<p>Verken genres, maak een playlist, bewaar je favoriete nummers, en meer!</p>

<div class="content-boxes">
    <div class="box">
        <img src="/images/genres.png" alt="Genres" width="250" height="400">
        <h3>Genres</h3>
        <p>Ontdek en kies uit verschillende muziekgenres.</p>
    </div>

    <div class="box">
        <img src="/images/music.png" alt="Liedjes Overzicht" width="250" height="400">
        <h3>Liedjes Overzicht</h3>
        <p>Bekijk alle liedjes binnen een genre en kies je favorieten.</p>
    </div>

    <div class="box">
        <img src="/images/playlists.png" alt="Playlist" width="250" height="400">
        <h3>Playlist</h3>
        <p>Beheer je tijdelijke playlist en geniet van jouw selectie.</p>
    </div>

    <div class="box">
        <img src="/images/register.png" alt="Registreren" width="250" height="400">
        <h3>Registreren</h3>
        <p>Registreer je om jouw playlists op te slaan en te beheren.</p>
    </div>

    <div class="box">
        <img src="/images/saved-playlists.png" alt="Opgeslagen Playlist" width="250" height="400">
        <h3>Opgeslagen Playlists</h3>
        <p>Bekijk en beheer je opgeslagen playlists voor de ultieme ervaring.</p>
    </div>

    <div class="box">
        <img src="/images/login.png" alt="Login" width="250" height="400">
        <h3>Login</h3>
        <p>Login en bekijk al jouw nummers, genres en playlists.</p>
    </div>
</div>
@endsection
