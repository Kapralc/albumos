<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Zobrazení seznamu fotek.
     */
    public function index(Request $request)
    {
        // Získání hledaného termínu z GET parametrů
        $search = $request->get('search');
        
        // Načtení fotek s filtrováním podle názvu
        $photos = Photo::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%'); // Filtrace podle názvu
        })
        ->latest() // Seřazení fotek podle nejnovějších
        ->get();
        
        // Předání fotek do view
        return view('photos.index', compact('photos'));
    }

    /**
     * Zobrazení formuláře pro vytvoření nové fotky.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Uložení nové fotky do databáze a souborového systému.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255', // Validace názvu fotky
            'photo' => 'required|image|max:2048', // Validace nahraného souboru (max. 2MB)
        ]);

        // Uložení fotky do složky 'photos' ve veřejném disku
        $path = $request->file('photo')->store('photos', 'public');

        // Vytvoření záznamu v databázi
        Photo::create([
            'title' => $request->title,
            'path' => $path,
        ]);

        // Přesměrování zpět na index fotek s úspěšnou zprávou
        return redirect()->route('photos.index')->with('success', 'Fotka byla úspěšně nahrána!');
    }

    /**
     * Smazání fotky z databáze a souborového systému.
     */
    public function destroy(Photo $photo)
    {
        // Smazání souboru z veřejného disku
        Storage::disk('public')->delete($photo->path);

        // Smazání záznamu z databáze
        $photo->delete();

        // Přesměrování zpět na index fotek s úspěšnou zprávou
        return redirect()->route('photos.index')->with('success', 'Fotka byla úspěšně smazána!');
    }
}