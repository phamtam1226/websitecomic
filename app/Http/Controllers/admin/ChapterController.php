<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ChapterController extends Controller
{
    public function index()
    {
        $comics = Comic::orderBy('created_at', 'desc')->paginate(1);
        return view('admin.pages.chapters.index', compact('comics'));
    }

    public function search(Request $request)
    {
        $comic_name = $request->comic_name;
        $comics = Comic::where('comic_name', 'LIKE', '%' . $comic_name . '%')->get();
        return view('admin.pages.chapters.index', compact('comics'));
    }


    public function showAll(Comic $comic)
    {
        $chapters = $comic->chapters;
        return view('admin.pages.chapters.showAll', compact('comic', 'chapters'));
    }


    public function create(Comic $comic)
    {
        return view('admin.pages.chapters.create', compact('comic'));
    }

    public function store(Request $request, Comic $comic)
    {
        $request->validate([
            'chapter_name' => 'required',
            'coin' => 'required',
            'images' => 'required',
            'images.*' => 'image',
            'number_comment' => 'required',
            'number_view' => 'required',
        ]);

        $imagePaths = [];

        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('public/chapters');
            }
        }

        // Lưu chapter mới vào bảng chapters
        $chapter = new Chapter([
            'chapter_name' => $request->chapter_name,
            'coin' => $request->coin,
            'images' => implode(',', $imagePaths),
            'number_comment' => $request->number_comment,
            'number_view' => $request->number_view,
        ]);

        $comic->chapters()->save($chapter);

        // Lưu từng đường dẫn hình ảnh vào bảng chapter_images
        foreach ($imagePaths as $imagePath) {
            $chapter->images()->create([
                'image_path' => $imagePath,
            ]);
        }
      //  $comic = Comic::find($comic);
        $comic->number_chapters++;
        $comic->save();

        return redirect()->route('admin.chapters.showAll', [$comic])->with('success', 'Chapter created successfully.');
    }

    public function show(Comic $comic, Chapter $chapter)
    {
        return view('admin.pages.chapters.show', compact('comic', 'chapter'));
    }

    public function edit(Comic $comic, Chapter $chapter)
    {
        return view('admin.pages.chapters.edit', compact('comic', 'chapter'));
    }

    public function update(Request $request, Comic $comic, Chapter $chapter)
    {
        $request->validate([
            'chapter_name' => 'required',
            'coin' => 'required',
            'images' => 'nullable',
            'images.*' => 'image',
        ]);

        if($request->hasFile('images')){

            foreach ($chapter->images as $chapterImage) {
                Storage::delete($chapterImage->image_path);
                $chapterImage->delete();
            }
        
            $imagePaths = [];
        
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('public/chapters');
            }
        
            $chapter->update([
                'chapter_name' => $request->chapter_name,
                'coin' => $request->coin,
                'images' => implode(',', $imagePaths),
            ]);
        
            // Lưu từng đường dẫn hình ảnh vào bảng chapter_images
            foreach ($imagePaths as $imagePath) {
                $chapter->images()->create([
                    'image_path' => $imagePath,
                ]);
            }
        } else {
            $chapter->update(['chapter_name' => $request->chapter_name,'coin' => $request->coin]);
        }
        
        return redirect()->route('admin.chapters.showAll', [$comic])->with('success', 'Chapter updated successfully.');
    }


    public function destroy(Comic $comic, Chapter $chapter)
    {
        foreach (explode(',', $chapter->images) as $image) {
            Storage::delete($image);
        }

        $chapter->delete();

        return redirect()->route('admin.chapters.showAll', $comic)->with('success', 'Chapter deleted successfully');
    }

}
