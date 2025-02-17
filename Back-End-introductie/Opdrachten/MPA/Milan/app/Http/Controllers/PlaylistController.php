<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the playlists.
     */
    public function index()
    {
        // Haal alleen de playlists op van de ingelogde gebruiker
        $playlists = Playlist::where('user_id', Auth::id())->get();

        return view('playlists.index', compact('playlists'));
    }


    /**
     * Show the form for creating a new playlist.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created playlist in storage.
     */
    public function store(Request $request)
    {

        // Controleer de ingelogde gebruiker
        $userId = Auth::id();
        
        // Valideer de inkomende gegevens
        $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);

        // Maak een nieuwe playlist aan en sla deze op in de database
        Playlist::create([
            'name' => $request->get('name'),
            'user_id' => Auth::id(), // Hier wordt de user_id toegevoegd
        ]);

        // Redirect naar de playlist index met een succesbericht
        return redirect()->route('playlists.index')->with('success', 'Playlist successfully created!');
    }

    /**
     * Display the specified playlist with available songs to add.
     */
    public function show($id)
    {
        // Haal de playlist op met de bijbehorende songs
        $playlist = Playlist::with('songs')->findOrFail($id);

        // Bereken de totale duur van de playlist
        $totalDuration = $playlist->songs->sum('duration'); // De duur in minuten

        // Haal nummers op die nog niet aan de playlist zijn toegevoegd
        $songs = Song::whereDoesntHave('playlists', function($query) use ($playlist) {
            $query->where('playlist_id', $playlist->id);
        })->get();

        return view('playlists.show', compact('playlist', 'songs', 'totalDuration'));
    }

    /**
     * Show the form for editing the specified playlist.
     */
    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified playlist in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $playlist->update(['name' => $request->name]);

        return redirect()->route('playlists.index')->with('success', 'Playlist naam bijgewerkt!');
    }

    /**
     * Remove the specified playlist from storage.
     */
    public function destroy(Playlist $playlist)
    {
        // Verwijder de playlist
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist succesvol verwijderd!');
    }

    /**
     * Voeg een liedje toe aan de playlist, als het nog niet is toegevoegd.
     */
    public function addSong(Request $request, Playlist $playlist)
    {
        // Valideer het ID van het liedje
        $validated = $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        // Controleer of het liedje al in de playlist zit
        if (!$playlist->songs()->where('song_id', $validated['song_id'])->exists()) {
            $playlist->songs()->attach($validated['song_id']);
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song toegevoegd aan playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Song is al in de playlist!');
    }

    /**
     * Verwijder een liedje uit de playlist.
     */
    public function removeSong(Playlist $playlist, $songId)
    {
        if ($playlist->songs()->detach($songId)) {
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song verwijderd uit playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Kan song niet verwijderen!');
    }

    /**
     * Valideer het verzoek voor het aanmaken van een playlist.
     */
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);
    }
}


