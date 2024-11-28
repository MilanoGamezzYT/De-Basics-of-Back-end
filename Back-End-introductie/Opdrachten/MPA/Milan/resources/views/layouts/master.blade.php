<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPA</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @stack("styles")
</head>
<body>

<nav>
    <ul>
        <li><a href="{{ url('/hello') }}">Home</a></li>
        <li><a href="{{ url('/genre/create') }}">Genres</a></li>
        <li><a href="{{ url('/songs') }}">Liedjes</a></li>
        <li><a href="{{ url('/playlists') }}">Playlists</a></li>
        <li><a href="{{ url('/register') }}">Registreren</a></li>
        <li><a href="{{ url('/login') }}">Inloggen</a></li>
    </ul>
</nav>

@yield("content")

@stack('scripts')
<footer>&copy; Milan Sebes - 2024</footer>
</body>
</html>
