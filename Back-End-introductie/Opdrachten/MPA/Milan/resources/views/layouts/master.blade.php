<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPA</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>
<body>

<nav>
    <ul>
        <li><a href="{{ url('/hello') }}" class="{{ request()->is('hello') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/genres') }}" class="{{ request()->is('genres*') ? 'active' : '' }}">Genres</a></li>
        <li><a href="{{ url('/songs') }}" class="{{ request()->is('songs*') ? 'active' : '' }}">Liedjes</a></li>
        <li><a href="{{ url('/playlists') }}" class="{{ request()->is('playlists*') ? 'active' : '' }}">Playlists</a></li>
        
        @guest
            <li><a href="{{ route('temporary-playlist.create') }}" class="{{ request()->is('temporary-playlist/create') ? 'active' : '' }}">Maak tijdelijke playlist</a></li>
            <li><a href="{{ url('/register') }}" class="{{ request()->is('register') ? 'active' : '' }}">Registreren</a></li>
            <li><a href="{{ url('/login') }}" class="{{ request()->is('login') ? 'active' : '' }}">Inloggen</a></li>
        @endguest

        @auth
            @if(request()->is('playlists*'))
                <li><a href="{{ url('/playlists/create') }}" class="{{ request()->is('playlists/create') ? 'active' : '' }}">Nieuwe Playlist</a></li>
            @endif

            @if(request()->is('songs'))
                <li><a href="{{ url('/songs/create') }}" class="{{ request()->is('songs/create') ? 'active' : '' }}">Nieuwe Song</a></li>
            @endif

            <li class="nav-right">
                <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Uitloggen</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>

@yield('content')

@stack('scripts')

<footer>&copy; Milan Sebes - 2025</footer>
</body>
</html>
