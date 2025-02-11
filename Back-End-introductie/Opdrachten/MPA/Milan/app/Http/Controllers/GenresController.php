<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle genres op
        $genres = Genre::all(); 

        // Return de view met de genres
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Toon de form om een nieuw genre aan te maken
        return view('genres.create');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer het verzoek voor het opslaan van een nieuw genre
        $validated = $request->validate([
            'name' => 'required|unique:genres,name|min:2',
            'description' => 'nullable|string'
        ]);

        // Sla het nieuwe genre op
        Genre::create([
            'name' => $validated['name'],
            'description' => $request->input('description') ?? null
        ]);

        // Redirect naar de genres index-pagina met een succesbericht
        return redirect()->route('genres.index')->with('success', 'Genre successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $genre = Genre::with('songs')->findOrFail($id);
        return view('genres.show', compact('genre'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        // Toon de form om een bestaand genre te bewerken
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        // Valideer de input bij het updaten van een genre
        $validated = $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id . '|min:2',
            'description' => 'nullable|string'
        ]);

        // Update het genre met de gevalideerde data
        $genre->update($validated);

        // Redirect naar de genres index-pagina met een succesbericht
        return redirect()->route('genres.index')->with('success', 'Genre updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        // Verwijder het opgegeven genre
        $genre->delete();

        // Redirect naar de genres index-pagina met een succesbericht
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully!');
    }

    /**
     * Show songs related to a genre.
     */
    public function songs(Genre $genre)
    {
        // Haal de songs voor een bepaald genre (voorbeeld voor een relatie)
        $songs = $genre->songs; // Je zou een relatie moeten hebben gedefinieerd in het Genre-model

        // Return de view met de songs
        return view('songs.index', compact('songs'));
    }
}
