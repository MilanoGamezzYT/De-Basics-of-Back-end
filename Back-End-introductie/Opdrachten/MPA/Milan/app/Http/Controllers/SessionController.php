<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;

class SessionController extends Controller
{
    /**
     * Toon het formulier om een tijdelijke playlist te maken.
     */
    public function create()
    {
        return view('temporary-playlist.create');
    }

    /**
     * Sla de tijdelijke playlist op in de sessie.
     */
    public function store(Request $request)
    {
        // Validatie van de playlistnaam
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tijdelijke playlist opslaan in de sessie
        $temporaryPlaylist = [
            'name' => $request->input('name'),
            'songs' => [],
        ];

        session(['temporary_playlist' => $temporaryPlaylist]);

        return redirect()->route('temporary-playlist.show')
            ->with('success', 'Tijdelijke playlist succesvol aangemaakt!');
    }

    /**
     * Toon de tijdelijke playlist.
     */
    public function show()
    {
        $temporaryPlaylist = session('temporary_playlist', null);

        if (!$temporaryPlaylist) {
            return redirect()->route('temporary-playlist.create')
                ->with('error', 'Geen tijdelijke playlist gevonden. Maak er een aan.');
        }

        // Haal alle beschikbare nummers op uit het Song model
        $songs = Song::all();

        // Haal de song_id's op die in de tijdelijke playlist zijn opgeslagen
        $songIds = $temporaryPlaylist['songs'];

        // Haal de nummers op basis van de song_id's
        $playlistSongs = Song::whereIn('id', $songIds)->get();

        return view('temporary-playlist.show', ['playlist' => $temporaryPlaylist, 'songs' => $songs, 'playlistSongs' => $playlistSongs]);
    }

    /**
     * Voeg een nummer toe aan de tijdelijke playlist.
     */
    public function addSong(Request $request)
    {
        // Validatie van het nummer
        $request->validate([
            'song_id' => 'required|integer|exists:songs,id', // Verifieer dat het song_id een geldig nummer is
        ]);

        // Haal de tijdelijke playlist op uit de sessie
        $temporaryPlaylist = session('temporary_playlist', null);

        // Als de playlist niet bestaat, stuur de gebruiker terug naar de creatiepagina
        if (!$temporaryPlaylist) {
            return redirect()->route('temporary-playlist.create')
                ->with('error', 'Geen tijdelijke playlist gevonden. Maak er een aan.');
        }

        // Haal het nummer op uit de database
        $song = Song::find($request->input('song_id'));

        // Voeg de song_id toe aan de playlist
        $temporaryPlaylist['songs'][] = $song->id; // Voeg de ID van het nummer toe

        // Sla de bijgewerkte playlist op in de sessie
        session(['temporary_playlist' => $temporaryPlaylist]);

        return redirect()->route('temporary-playlist.show')
            ->with('success', 'Nummer succesvol toegevoegd aan de tijdelijke playlist!');
    }

    /**
     * Verwijder de tijdelijke playlist.
     */
    public function clear()
    {
        session()->forget('temporary_playlist');
        return redirect()->route('playlists.index');
    }

    /**
    * Verwijder een nummer uit de tijdelijke playlist.
    */
    public function removeSong($songId)
    {
        // Haal de tijdelijke playlist op uit de sessie
        $temporaryPlaylist = session('temporary_playlist', null);

        // Als de playlist niet bestaat, stuur de gebruiker terug naar de creatiepagina
        if (!$temporaryPlaylist) {
            return redirect()->route('temporary-playlist.create')
                ->with('error', 'Geen tijdelijke playlist gevonden. Maak er een aan.');
        }

        // Verwijder het nummer uit de lijst van nummers
        $temporaryPlaylist['songs'] = array_filter($temporaryPlaylist['songs'], function($song) use ($songId) {
            return $song !== (int) $songId; // Verwijder het song ID dat overeenkomt met het verwijderde nummer
        });

        // Herschik de array-indexen (optie) zodat het een nette numerieke index heeft
        $temporaryPlaylist['songs'] = array_values($temporaryPlaylist['songs']);

        // Sla de bijgewerkte playlist op in de sessie
        session(['temporary_playlist' => $temporaryPlaylist]);

        return redirect()->route('temporary-playlist.show')
            ->with('success', 'Nummer succesvol verwijderd uit de tijdelijke playlist!');
    }

    /**
     * Sla de tijdelijke playlist op in de database.
     */
    public function save(Request $request)
    {
        // Controleer of de gebruiker is ingelogd
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je playlist op te slaan.');
        }

        // Haal de tijdelijke playlist op uit de sessie
        $temporaryPlaylist = session('temporary_playlist', null);

        // Als de playlist niet bestaat, stuur de gebruiker terug naar de creatiepagina
        if (!$temporaryPlaylist) {
            return redirect()->route('temporary-playlist.create')
                ->with('error', 'Geen tijdelijke playlist gevonden. Maak er een aan.');
        }

        // Maak een nieuwe playlist voor de ingelogde gebruiker
        $playlist = new Playlist();
        $playlist->name = $temporaryPlaylist['name'];
        $playlist->save(); // Sla de playlist op in de database

        // Voeg de nummers toe aan de playlist
        foreach ($temporaryPlaylist['songs'] as $songId) {
            $playlist->songs()->attach($songId);
        }

        // Verwijder de tijdelijke playlist uit de sessie
        session()->forget('temporary_playlist');

        return redirect()->route('playlists.index')
            ->with('success', 'Je tijdelijke playlist is succesvol opgeslagen!');
    }
}
