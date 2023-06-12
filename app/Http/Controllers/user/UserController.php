<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Comment;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách thể loại
        $genres = Genre::all();

        $comics = Comic::all();
        $comment = Comment::orderBy('created_at', 'desc')->get();

        $comics->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        });

        // Sắp xếp lại các truyện dựa trên thời gian tạo của chapter mới nhất
        $comics = $comics->sortByDesc(function ($comic) {
            return $comic->chapters->max('created_at');
        });

        $nominatedComics = Comic::orderBy('created_at', 'desc')->get();
        $totalcomment= Comment::all()->count();

        // Trả về view và truyền biến genres và comics
        return view('user.pages.index', compact('genres', 'comics', 'nominatedComics','comment','totalcomment'));
    }


    public function details($comicId)
    {
        $comic = Comic::find($comicId);
        $genres = Genre::all();
        $comment = Comment::orderBy('created_at', 'desc')->get();
        $totalcomment= Comment::where('comic_id',$comicId)->count();

        return view('user.pages.details', compact('comic', 'genres','comment','totalcomment'));
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
        $comment = Comment::where('chapter_id',$chapterId)->where('status',1)->orderBy('created_at', 'desc')->get();

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

        $totalcomment =  Comment::where('chapter_id',$chapterId)->count();

        return view('user.pages.chapter', compact('genres', 'chapter', 'prevChapter', 'nextChapter','comment','totalcomment'));
    }
    public function postComment(Request $request)
    {
       
        $comment = new Comment();
        $comment->user_id=$request->user_id;
        $comment->comic_id=$request->comic_id;
        $comment->chapter_id=$request->chapter_id;
        $comment->content=$request->content;
        $comment->status=$request->status;
        $comment->save();
         return back();
        
    }
}
