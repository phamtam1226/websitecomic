<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::all();
        return view('admin.pages.comics.index', compact('comics'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.pages.comics.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comic_name' => 'required',
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'exists:genres,id',
            'description' => 'nullable',
            'status' => 'required',
            'cover_image' => 'required|image',
            'number_chapters' => 'required',
            'number_comments' => 'required',
            'number_views' => 'required',
            'number_follows' => 'required'
        ]);

        $coverImagePath = $request->file('cover_image')->store('public/comics');

        $comic = Comic::create([
            'comic_name' => $request->comic_name,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverImagePath,
            'number_chapters' => $request->number_chapters,
            'number_comments' => $request->number_comments,
            'number_views' =>  $request->number_views,
            'number_follows' =>  $request->number_follows,
            'day_views' => 0,
            'month_views' => 0,
            'week_views' => 0,
        ]);

        $comic->genres()->sync($request->genre_ids); // Lưu các thể loại đã chọn

        if ($comic) {
            Session::flash('message', 'Thêm truyện thành công');
        } else {
            Session::flash('message', 'Thêm truyện thất bại');
        }

        return redirect()->route('admin.comics.index');
    }


    public function show(Comic $comic)
    {
        return view('admin.pages.comics.show',compact('comic'));
    }

    public function edit(Comic $comic)
    {
        $genres = Genre::all();
        $selectedGenres = $comic->genres->pluck('id')->toArray();

        return view('admin.pages.comics.edit', compact('comic', 'genres', 'selectedGenres'));
    }

    public function update(Request $request, Comic $comic)
    {

        $request->validate([
            'comic_name' => 'required',
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'exists:genres,id',
            'description' => 'nullable',
            'status' => 'required',
            'cover_image' => 'nullable|image',
        ]);

        if ($request->hasFile('cover_image') && $request->file('cover_image')->isValid()) {
            Storage::delete($comic->cover_image);
            $coverImagePath = $request->file('cover_image')->store('public/comics');
        } else {
            $coverImagePath = $comic->cover_image;
        }
        
        $comic->update([
            'comic_name' => $request->comic_name,
            'description' => $request->description,
            'status' => $request->status,
            'cover_image' => $coverImagePath,
        ]);

        $comic->genres()->sync($request->genre_ids);

        if ($comic->save()) {
            Session::flash('message', 'Cập nhật truyện thành công');
        } else {
            Session::flash('message', 'Cập nhật truyện thất bại');
        }

        return redirect()->route('admin.comics.index');
    }

    public function day_fresh(){
        DB::table('comics')->update(['day_views' => 0]);
    }

    public function week_fresh(){
        DB::table('comics')->update(['week_views' => 0]);
    }

    public function month_fresh(){
        DB::table('comics')->update(['month_views' => 0]);
    }

    public function destroy(Comic $comic)
    {
        Storage::delete($comic->cover_image);
        $comic->delete();
        return redirect()->route('admin.comics.index');
    }
}
