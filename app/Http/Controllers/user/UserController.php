<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Comic;
use App\Models\Chapter;

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

    // }
    public function timtruyen($genreId = null)
    {
        $genres = Genre::orderBy('name')->get();
        $selectedGenre = null;

        if ($genreId) {
            $selectedGenre = Genre::findOrFail($genreId);
            $comics = $selectedGenre->comics()->get();
        } else {
            $comics = Comic::all();
        }

        // Lấy 3 chương mới nhất cho mỗi truyện
        foreach ($comics as $comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('user.pages.findcomic', compact('genres', 'comics', 'selectedGenre'));
    }


    public function timtruyennangcao()
    {
        // Xử lý tìm kiếm nâng cao ở đây
    }

    public function history()
    {
        $genres = Genre::all();
        return view('user.pages.history', compact('genres'));
    }

    public function chapter($chapterId)
    {
        $genres = Genre::all();

        // Tìm chapter dựa trên ID được cung cấp
        $chapter = Chapter::with('comic')->findOrFail($chapterId);

        // Lấy chapter trước đó
        $prevChapter = Chapter::where('comic_id', $chapter->comic_id)
            ->where('id', '<', $chapterId)
            ->orderBy('id', 'desc')
            ->first();

        // Lấy chapter tiếp theo
        $nextChapter = Chapter::where('comic_id', $chapter->comic_id)
            ->where('id', '>', $chapterId)
            ->orderBy('id', 'asc')
            ->first();

        return view('user.pages.chapter', compact('genres', 'chapter', 'prevChapter', 'nextChapter'));
    }
}
