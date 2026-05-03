<?php

namespace App\Http\Controllers;

use App\Models\Contents;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\facades\file;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Contents::all();
        return view('content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genres::All();
        return view('content.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required',
            'genre_id' => 'required',
            'media_title' => 'required' ,
            'media_file' => 'required|file|max:40000|mimes:mp3',
            'description' => 'required',
            // 'credits' => 'required',
            // 'cover_pic' => 'required'
        ]);

        $content_file = $request->file('media_file');
        $file_name = "media_".time().".".
        $content_file->getClientOriginalExtension();
        $upload_dir = 'uploaded/media';
        $content_file->move($upload_dir, $file_name);

        Contents::create([
            'user_id' => '1',
            'genre_id' => $request->genre_id,
            'media_title' => $request->media_title ,
            'media_file' => $file_name,
            'description' => $request->description,
            'credits' => 'test',
            'cover_pic' => 'test'
        ]);
        return redirect('content');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contents $content)
    {
        return view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contents $content){
        $genre = Genres::all();
        return view('content.edit', compact('content', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contents $content){
        $request->validate([
        'genre_id' => 'required',
        'media_title' => 'required',
        'description' => 'required',
        'media_file' => 'nullable',
        ]);
        $content->update([
        'genre_id' => $request->genre_id,
        'media_title' => $request->media_title,
        'description' => $request->description,
        'media_file' => $request->media_file,
    ]);
        return redirect('content');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contents $content) {
    $content->delete();
    return redirect()->route('content.index');
    }
}
