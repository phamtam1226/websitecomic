<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Comic;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách thể loại
        $genres = Genre::all();

        $comics = Comic::all();
        $comics->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        });

        // Sắp xếp lại các truyện dựa trên thời gian tạo của chapter mới nhất
        $comics = $comics->sortByDesc(function ($comic) {
            return $comic->chapters->max('created_at');
        });

        $nominatedComics = Comic::orderBy('created_at', 'desc')->get();

        // Trả về view và truyền biến genres và comics
        return view('user.pages.index', compact('genres', 'comics', 'nominatedComics'));
    }


    public function details($comicId)
    {
        $comic = Comic::find($comicId);
        $genres = Genre::all();

        return view('user.pages.details', compact('comic', 'genres'));
    }


    public function timtruyen()
    {
        $genres = Genre::all();
        return view('user.pages.findcomic', compact('genres'));
    }

    public function history()
    {
        $genres = Genre::all();
        return view('user.pages.history', compact('genres'));
    }

    public function chapter(){
        $genres = Genre::all();
        return view('user.pages.chapter', compact('genres'));
    }
}
