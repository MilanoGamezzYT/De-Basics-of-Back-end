<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle liedjes op inclusief hun genres en stuur naar de index view
        $songs = Song::with('genre')->get();  // Haalt de gerelateerde genre op
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Haal alle genres op voor gebruik in de create view
        $genres = Genre::all(); 
        return view('songs.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de gegevens van het nieuwe liedje
        $validated = $request->validate([
            'title' => 'required|string|min:2|max:255',
            'artist' => 'required|string|min:2|max:255',
            'duration' => 'required|integer|min:1', // Duur in seconden
        ]);

        // Maak een nieuw liedje aan in de database
        Song::create($validated);

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('songs.index')->with('success', 'Song successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Zoek het specifieke liedje op met zijn genre
        $song = Song::with('genre')->findOrFail($id);
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        // Haal alle genres op voor de edit view
        $genres = Genre::all();
        return view('songs.edit', compact('song', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        // Valideer de gegevens voor het updaten van het liedje
        $validated = $request->validate([
            'title' => 'required|string|min:2|max:255',
            'artist' => 'required|string|min:2|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        // Update het liedje met nieuwe gegevens
        $song->update($validated);

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('songs.index')->with('success', 'Song successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        // Verwijder het liedje
        $song->delete();

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully!');
    }
}
