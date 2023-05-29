<?php

namespace App\Http\Controllers\admin;

use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ChapterController extends Controller
{
    // public function index(Comic $comic)
    // {
    //     $chapters = $comic->chapters;
    //     return view('chapters.index', compact('chapters', 'comic'));
    // }

    public function create(Comic $comic)
    {
        return view('admin.chapters.create', compact('comic'));
    }

    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'chapter_name' => 'required',
            'images' => 'required',
            'images.*' => 'image',
        ]);

        $imagePaths = [];

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('public/chapters');
            }
        }

        $chapter = new Chapter([
            'chapter_name' => $request->chapter_name,
            'images' => implode(',', $imagePaths),
        ]);

        $comic->chapters()->save($chapter);

        return redirect()->route('admin.comics.show', $comic)->with('success','Chapter created successfully.');
    }

    public function show(Comic $comic, Chapter $chapter)
    {
        return view('admin.chapters.show', compact('comic', 'chapter'));
    }

    public function edit(Comic $comic, Chapter $chapter)
    {
        return view('admin.chapters.edit', compact('comic', 'chapter'));
    }

    public function update(Request $request, Comic $comic, Chapter $chapter)
    {
        $request->validate([
            'chapter_name' => 'required',
            'images' => 'nullable',
            'images.*' => 'image',
        ]);

        if($request->hasFile('images')){
            foreach (explode(',', $chapter->images) as $image) {
                Storage::delete($image);
            }            

            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('public/chapters');
            }

            $chapter->update([
                'chapter_name' => $request->chapter_name,
                'images' => implode(',', $imagePaths),
            ]);
        } else {
            $chapter->update(['chapter_name' => $request->chapter_name]);
        }

        return redirect()->route('admin.comics.chapters.show', [$comic, $chapter])->with('success','Chapter updated successfully');
    }


    public function destroy(Comic $comic, Chapter $chapter)
    {
        foreach (explode(',', $chapter->images) as $image) {
            Storage::delete($image);
        }
        

        $chapter->delete();

        return redirect()->route('admin.comics.show', $comic)->with('success','Chapter deleted successfully');
    }
}
