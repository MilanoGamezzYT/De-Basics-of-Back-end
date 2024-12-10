<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the playlists.
     */
    public function index()
    {
        // Haal alle playlists op met het aantal liedjes
        $playlists = Playlist::withCount('songs')->get();
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
        // Valideer en maak een nieuwe playlist
        $playlist = Playlist::create($this->validateRequest($request));

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
        $totalDuration = $playlist->songs->sum('duration'); // De duur in minuten, veronderstel dat 'duration' een kolom is in de 'songs' tabel

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
        // Update de playlist
        $playlist->update($this->validateRequest($request));

        return redirect()->route('playlists.index')->with('success', 'Playlist successfully updated!');
    }

    /**
     * Remove the specified playlist from storage.
     */
    public function destroy(Playlist $playlist)
    {
        // Verwijder de playlist
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist successfully deleted!');
    }

    /**
     * Add a song to the playlist.
     */
    public function addSong(Request $request, Playlist $playlist)
    {
        // Valideer het ID van het liedje
        $validated = $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        // Voeg het liedje toe als het nog niet in de playlist zit
        if (!$playlist->songs()->where('song_id', $validated['song_id'])->exists()) {
            $playlist->songs()->attach($validated['song_id']);
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song added to playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Song is already in the playlist!');
    }

    /**
     * Remove a song from the playlist.
     */
    public function removeSong(Playlist $playlist, $songId)
    {
        // Verwijder het liedje uit de playlist
        if ($playlist->songs()->detach($songId)) {
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song removed from playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Failed to remove song!');
    }

    /**
     * Validate incoming playlist request.
     */
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|max:500',
        ]);
    }
}

