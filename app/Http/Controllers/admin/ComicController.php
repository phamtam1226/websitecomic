<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.comics.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comic_name' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'nullable',
            'status' => 'required',
            'cover_image' => 'required|image',
        ]);

        $coverImagePath = $request->file('cover_image')->store('public/comics');

        $comic = Comic::create([
            'comic_name' => $request->comic_name,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('admin.comics.index')->with('success','Comic created successfully.');
    }

    public function show(Comic $comic)
    {
        return view('admin.comics.show',compact('comic'));
    }

    public function edit(Comic $comic)
    {
        $genres = Genre::all();
        return view('admin.comics.edit',compact('comic', 'genres'));
    }

    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'comic_name' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'nullable',
            'status' => 'required',
            'cover_image' => 'required|image',
        ]);

        if($request->hasFile('cover_image')){
            Storage::delete($comic->cover_image);
            $coverImagePath = $request->file('cover_image')->store('public/comics');
        }else{
            $coverImagePath = $comic->cover_image;
        }

        $comic->update([
            'comic_name' => $request->comic_name,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverImagePath,
        ]);

        return redirect()->route('admin.comics.show', $comic)->with('success','Comic updated successfully');
    }

    public function destroy(Comic $comic)
    {
        Storage::delete($comic->cover_image);
        $comic->delete();
        return redirect()->route('admin.comics.index')->with('success','Comic deleted successfully');
    }
}
