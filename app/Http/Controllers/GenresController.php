<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::all();
        return view('genres.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'genre_name' => 'required',
            'description' => 'required',
        ]);

        genres::create([
            'genre_name' => $request->genre_name,
            'description' => $request->description,
        ]);
        return redirect()->route('genres.index');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(Genres $genres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genres $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genres $genre)
    {
    $request->validate([
        'genre_name' => 'required',
        'description' => 'required',
    ]);

    $genre->update([
        'genre_name' => $request->genre_name,
        'description' => $request->description,
    ]);

    return redirect()->route('genres.index');
    }

    public function destroy(Genres $genre)
    {
        $genre->delete(); 
        return redirect()->route('genres.index');
    }
}
