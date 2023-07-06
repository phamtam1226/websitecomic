<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Storage;
use App\Models\Follow;
use App\Models\History;
use App\Models\Bill;
use App\Models\ChapterBill;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;


class UserController extends Controller
{
    public function index()
    {
         // Lấy danh sách thể loại
         $genres = Genre::all();

         $comics = Comic::orderBy('created_at', 'desc')->paginate(8);
         $comment = Comment::orderBy('created_at', 'desc')->get();
         $history = History::where('status', 0)->where('status', 0)->orderBy('created_at', 'desc')->get();
         $comics->each(function ($comic) {
             $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
         });
        // $genres = Genre::all();
        // $comics = Comic::all();
        // $comment = Comment::orderBy('created_at', 'desc')->get();
    
        // $comics->each(function ($comic) {
        //     $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        // });
    
        // // Sắp xếp lại các truyện dựa trên thời gian tạo của chapter mới nhất
        // $comics = $comics->sortByDesc(function ($comic) {
        //     return $comic->chapters->max('created_at');
        // });

        // // Phân trang bằng tay sau khi đã sắp xếp
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $itemCollection = collect($comics);
        // $perPage = 8;
        // $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        // $comics= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        $nominatedComics = Comic::orderBy('created_at', 'desc')->get();
    
        $topdayComic = Comic::orderBy('day_views','desc')->take(5)->get();
        $topdayComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        $topweekComic = Comic::orderBy('week_views','desc')->take(5)->get();
        $topweekComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        $topmonthComic = Comic::orderBy('month_views','desc')->take(5)->get();
        $topmonthComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        // Trả về view và truyền biến genres và comics
       
        $opchapter = ChapterBill::all();
        return view('user.pages.index', compact('genres', 'comics', 'history', 'opchapter', 'nominatedComics', 'comment', 'topdayComic', 'topweekComic', 'topmonthComic'));
    }
    

    public function details($comicId)
    {
        $comic = Comic::find($comicId);
        $genres = Genre::all();
        $chapter = Chapter::where('comic_id', $comicId)->orderBy('created_at', 'desc')->get();

        $comment = Comment::where('comic_id', $comicId)->where('status', 1)->orderBy('created_at', 'desc')->get();

        $commentreply = CommentReply::where('status', 1)->get();
        $history = History::where('comic_id', $comicId)->where('user_id', 1)->get();
        $opchapter = ChapterBill::all();
        $firstChapterId = null;
        $lastChapterId = null; 

        if ($comic->chapters->first()) {
            $firstChapterId = $comic->chapters->first()->id;
        }
        
        if ($comic->chapters->last()) {
            $lastChapterId = $comic->chapters->last()->id;
        }
        

        return view('user.pages.details', compact('comic', 'chapter', 'genres', 'comment', 'commentreply', 'history', 'opchapter', 'firstChapterId', 'lastChapterId'));
    }

    // public function comics_search($genreId = null)
    // {
    //     $genres = Genre::orderBy('name')->get();
    //     $selectedGenre = null;

    //     if ($genreId) {
    //         $selectedGenre = Genre::findOrFail($genreId);
    //         $comics = $selectedGenre->comics()->get();
    //     } else {
    //         $comics = Comic::all();
    //     }

    //     foreach ($comics as $comic) {
    //         $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
    //     }

    //     return view('user.pages.comics_search', compact('genres', 'comics', 'selectedGenre'));
    // }

    public function comics_search($genreId = null)
    {
        $genres = Genre::orderBy('name')->get();
        $selectedGenre = null;

        if ($genreId) {
            $selectedGenre = Genre::findOrFail($genreId);
            $comics = $selectedGenre->comics()->paginate(12);
        } else {
            $comics = Comic::paginate(12);
        }

        foreach ($comics as $comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('user.pages.comics_search', compact('genres', 'comics', 'selectedGenre'));
    }


    public function comics_search_keyword(Request $request)
    {
        $keyword = $request->input('keyword');
        $comics = [];
        $genres = Genre::all();
        $lastestChap = [];

        if (!empty($keyword)) {
            $comics = Comic::where('comic_name', 'LIKE', "{$keyword}%")
                            ->with(['chapters' => function ($query) {
                                $query->orderBy('created_at', 'desc');
                            }, 'genres'])
                            ->select('id', 'comic_name', 'cover_image')
                            ->get();

            foreach ($comics as $comic) {
                $comic->cover_image = Storage::url($comic->cover_image);
                $comic->latest_chapter = $comic->chapters->first() ? $comic->chapters->first()->chapter_name : 'Chưa có chapter';
                $comic->genre_names = $comic->genres->pluck('name')->toArray();
                $lastestChap[$comic->id] = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
            }
        }

        if (!$request->ajax()) {
            return view('user.pages.search_results', compact('comics', 'genres', 'lastestChap'));
        }

        return response()->json($comics);
    }

    public function foundcomic($genreId,$status,$filter){
        //$comics = Comic::all();
        // if ($status != 0 && $status != 1) {
        //     $status = [0,1];
        // } else {
        //     $status = [$status];
        // }

        if ($genreId != 0) {
            $selectedGenre = Genre::findOrFail($genreId);
            $comics = $selectedGenre->comics()->paginate(12);
        } else {
            $comics = Comic::paginate(12);
        }

        if ($status == 1 || $status == 0) {
            $comics = $comics->where('status',$status);
        }

        switch ($filter) {
            case 'fol':
                $comics = $comics->sortByDesc('number_follows');
                break;

            case 'cmt':
                $comics = $comics->sortByDesc('number_comments');
                break;

            case 'new':
                $comics = $comics->sortByDesc('created_at');
                break;

            case 'upd':
                $comics = $comics->sortByDesc('updated_at');
                break;

            // case 'cha':
            //     $comics = Comic::whereIn('status', $status)->orderBy(chapter()->count(), 'desc')->get();
            //     break;

            case 'day':
                $comics = $comics = $comics->sortByDesc('day_views');
                break;

            case 'wek':
                $comics = $comics->sortByDesc('week_views');
                break;

            case 'mon':
                $comics = $comics->sortByDesc('month_views');
                break;

            default:
                $comics = $comics->sortByDesc('number_views');
                break;
        }

        foreach ($comics as $comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('user.pages.foundcomic', compact('comics'));
    }

    public function advanced_comics_search(Request $request)
    {
        $genres = Genre::all();
        $comics = Comic::query();

        // Đếm số lượng chương cho mỗi truyện
        $comics->withCount('chapters');

        // Lọc theo thể loại
        if ($request->has('genres')) {
            $selectedGenres = $request->get('genres');

            $request->session()->flash('genres', $selectedGenres);

            foreach ($selectedGenres as $genre) {
                $comics->WhereHas('genres', function ($query) use ($genre) {
                    $query->where('id', $genre);
                });
            }
        }

        // Lọc theo tình trạng truyện
        if ($request->filled('status')) {
            $status = $request->get('status');
            $comics->where('status', $status);
        }

        // Lọc theo số lượng chương
        if ($request->filled('chapter')) {
            $chapterCount = $request->get('chapter');
            $comics->having('chapters_count', '>=', $chapterCount);
        }

        // Sắp xếp lại $comics theo thứ tự mong muốn
        $sort = $request->input('sort');

        switch ($sort) {
            case 'newest':
                $comics->orderByDesc('created_at');
                break;
            case 'most_view':
                $comics->orderByDesc('number_views');
                break;
            case 'most_follow':
                $comics->orderByDesc('number_follows');
                break;
            case 'most_comment':
                $comics->orderByDesc('number_comments');
                break;
            case 'most_chapter':
                $comics->orderByDesc('chapters_count');
                break;
        }

        $comics = $comics->paginate(12);

        $comics->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        });
        
        return view('user.pages.advanced_comics_search', compact('genres', 'comics'));
    }



    public function history()
    {
        $genres = Genre::all();
        $topdayComic = Comic::orderBy('day_views','desc')->take(5)->get();
        $topdayComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        $topweekComic = Comic::orderBy('week_views','desc')->take(5)->get();
        $topweekComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        $topmonthComic = Comic::orderBy('month_views','desc')->take(5)->get();
        $topmonthComic->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        });
        return view('user.pages.history', compact('genres','topdayComic','topweekComic','topmonthComic'));
    }
    public function follow()
    {
        $genres = Genre::all();
      
        return view('user.pages.follow', compact('genres'));
    }
    public function loadfollow(Request $request)
    {
   
        $follows = Follow::where('user_id',  $request->user_id)->orderBy('created_at', 'desc')->get();
      
        return view('user.pages.listfollow', compact('follows'));
    }


    public function chapter($chapterId)
    {
        $genres = Genre::all();
        $comment = Comment::where('chapter_id', $chapterId)->where('status', 1)->orderBy('created_at', 'desc')->get();

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

        $totalcomment =  Comment::where('chapter_id', $chapterId)->count();

        return view('user.pages.chapter', compact('genres', 'chapter', 'prevChapter', 'nextChapter', 'comment', 'totalcomment'));
    }
    public function postComment(Request $request)
    {

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->comic_id = $request->comic_id;
        $comment->chapter_id = $request->chapter_id;
        $comment->content = $request->content;
        $comment->status = $request->status;
        $comment->total_cmtreply = 0;
        $comment->save();

        $chapter = Chapter::find($request->chapter_id);
        // $totalcomment =  Comment::where('chapter_id', $request->chapter_id)->get();
        $chapter->number_comment++;
        $chapter->save();
        $comic = Comic::find($request->comic_id);
        // $totalcomments =  Comment::where('comic_id', $request->comic_id)->count();
        $comic->number_comments++;
        $comic->save();
    }
    public function loadComment(Request $request)
    {

        $chapter_id = $request->chapter_id;
        $comment = Comment::where('chapter_id', $chapter_id)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $commentreply = CommentReply::where('status', 1)->get();

        return view('user.pages.listcomment', compact('comment', 'commentreply'));
      
    }
    public function loadNumbercomment(Request $request)
    {
        $chapter = Chapter::find($request->chapter_id);
        $total =  $chapter->number_comment;
        $output = ' <span class=""> <i class="fa fa-comments"></i> Tổng bình luận (<span class="">' . $total . '</span>)</span> 
        ';
        echo $output;
    }
    public function postCommentReply(Request $request)
    {

        $cmtreply = new CommentReply();
        $cmtreply->userreply_id = $request->userreply_id;
        $cmtreply->comment_id = $request->comment_id;
        $cmtreply->content_reply = $request->content_reply;
        $cmtreply->status = $request->status;
        $cmtreply->save();

        $comment = Comment::find($request->comment_id);
        $comment->total_cmtreply++;
        $comment->save();

        $chapter = Chapter::find($comment->chapter_id);
        $chapter->number_comment++;
        $chapter->save();

        $comic = Comic::find($comment->comic_id);
        // $totalcomments =  Comment::where('comic_id', $request->comic_id)->count();
        $comic->number_comments++;
        $comic->save();
    }
    public function postView(Request $request)
    {
        $chapter = Chapter::find($request->chapter_id);
        $chapter->number_view++;
        $chapter->save();

        $chapter = Comic::find($chapter->comic_id);
        $chapter->number_views++;
        $chapter->day_views++;
        $chapter->week_views++;
        $chapter->month_views++;
        $chapter->save();
    }

    public function theodoi(Request $request)
    {
        $follow = new Follow();
        $follow->comic_id = $request->comic_id;
        $follow->user_id = $request->user_id;
        $follow->save();  
        $comic = Comic::find($request->comic_id);
        $comic->number_follows++;  
        $comic->save();
        return Response::json([$comic], 200);
    }

    public function botheodoi(Request $request)
    {
        $follow = Follow::where('comic_id', $request->comic_id)->where('user_id',$request->user_id);
        $follow->delete();   
        $comic = Comic::find($request->comic_id);
        $comic->number_follows--;  
        $comic->save();  
        return Response::json([$follow], 200);
    }

    public function check(Request $request)
    {
        $follow = Follow::where('comic_id', $request->comic_id)->where('user_id',$request->user_id)->get();
        return Response::json([$follow], 200);

        //return view('user.pages.button',);// compact('comment', 'commentreply')
    }

    public function followlist(Request $request) {
        $list = Follow::where('user_id', $request->user_id)->orderBy('updated_at', 'desc')->get();
        return Response::json([$list], 200);
    }

    public function getcomic($comicId)
    {
        $comic = Comic::find($comicId);
        foreach ($comic as $comics) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(1)->get();
        }
        return Response::json([$comic], 200);
    }

    public function f_list($userId){
        $comicId = Follow::select('comic_id')->where('user_id',$userId);
        
        $comics = Comic::whereIn('id',$comicId)->get();
        $comics->each(function ($comic) {
            $comic->chapters = $comic->chapters()->orderBy('created_at', 'desc')->take(3)->get();
        });


        // Sắp xếp lại các truyện dựa trên thời gian tạo của chapter mới nhất
        $comics = $comics->sortByDesc(function ($comic) {
            return $comic->chapters->max('created_at');
        });
        return view('user.pages.f_list', compact('comics'));
    }
    public function postHistory(Request $request)
    {
        $chapter = Chapter::find($request->chapter_id);
        $history_chapter = History::where('chapter_id', $chapter->id);
        $history_chapter->delete();
        $history_newchapter = History::where('comic_id', $chapter->comic_id)->where('status', 0)->first();
        if ($history_newchapter != null) {
            $history_newchapter->status = 1;
            $history_newchapter->save();
        }
        $history = new History();
        $history->user_id = $request->user_id;
        $history->chapter_id = $chapter->id;
        $history->comic_id = $chapter->comic_id;
        $history->status = 0;
        $history->save();
    }
    public function destroyHistory(Request $request)
    {
        $historyid = History::find($request->history_id);
        $historyid->status = 1;
        $historyid->save();
        $history = History::where('user_id',  $request->user_id)->where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('user.pages.listhistory', compact('history'));
    }
    public function loadHistory(Request $request)
    {
        $history = History::where('user_id',  $request->user_id)->where('status', 0)->orderBy('created_at', 'desc')->paginate(8);
        return view('user.pages.listhistory', compact('history'));
    }

    public function payment(Request $request, $id)
    {

        $payment = new Bill();
        $payment->user_id = $id;
        $payment->coin = $request->options;
        $payment->save();

        $user = User::find($id);
        $user->total_coin = $user->total_coin + $request->options / 5;
        $user->save();
        $request->session()->forget('infoUser');
        $request->session()->put('infoUser', $user);
        return redirect()->route('user.account');
    }

    public function checkchapter(Request $request)
    {
        $chapters = Chapter::where('comic_id', $request->comic_id)->orderBy('created_at', 'desc')->get();
        $history = History::where('comic_id', $request->comic_id)->where('user_id', $request->user_id)->get();
        $opchapter = ChapterBill::where('user_id', $request->user_id)->get();
        return view('user.pages.listchapter', compact('history', 'chapters', 'opchapter'));
    }
    public function openchapter(Request $request)
    {


        $user = User::find($request->user_id);
        if ($user->total_coin >= 300) {
            $user->total_coin = $user->total_coin - $request->coin;
            $user->save();

            $paychapter = new ChapterBill();
            $paychapter->user_id = $request->user_id;
            $paychapter->chapter_id = $request->chapter_id;
            $paychapter->coin = $request->coin;
            $paychapter->save();

            $request->session()->forget('infoUser');
            $request->session()->put('infoUser', $user);
            return "Mở chapter thành công!";
        } else
            return "Số xu không đủ!";
    }
    public function loadcoin(Request $request)
    {

        $user = User::find($request->user_id);
        $coin =  $user->total_coin;
        echo  $coin;
    }
}
