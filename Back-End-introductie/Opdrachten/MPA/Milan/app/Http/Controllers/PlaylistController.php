<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle playlists op met het aantal liedjes
        $playlists = Playlist::withCount('songs')->get();
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Toon de form voor het aanmaken van een nieuwe playlist
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer en maak een nieuwe playlist
        $playlist = Playlist::create($this->validateRequest($request));

        // Redirect met succesbericht
        return redirect()->route('playlists.index')->with('success', 'Playlist successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        // Laad specifieke playlist met liedjes
        $playlist->load('songs');
        return view('playlists.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        // Toon de form om een bestaande playlist te bewerken
        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        // Update de playlist met gevalideerde gegevens
        $playlist->update($this->validateRequest($request));

        // Redirect met succesbericht
        return redirect()->route('playlists.index')->with('success', 'Playlist successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        // Verwijder de playlist
        $playlist->delete();

        // Redirect met succesbericht
        return redirect()->route('playlists.index')->with('success', 'Playlist successfully deleted!');
    }

    /**
     * Add a song to the specified playlist.
     */
    public function addSong(Request $request, Playlist $playlist)
    {
        // Valideer en voeg liedje toe aan de playlist
        $validated = $request->validate([
            'song_id' => 'required|exists:songs,id',
        ]);

        if (!$playlist->songs()->where('song_id', $validated['song_id'])->exists()) {
            $playlist->songs()->attach($validated['song_id']);
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song added to playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Song is already in the playlist!');
    }

    /**
     * Remove a song from the specified playlist.
     */
    public function removeSong(Playlist $playlist, $songId)
    {
        // Verwijder liedje uit de playlist
        if ($playlist->songs()->detach($songId)) {
            return redirect()->route('playlists.show', $playlist->id)->with('success', 'Song removed from playlist!');
        }

        return redirect()->route('playlists.show', $playlist->id)->with('error', 'Failed to remove song!');
    }

    /**
     * Validate incoming playlist requests.
     */
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|max:500',
        ]);
    }
}

