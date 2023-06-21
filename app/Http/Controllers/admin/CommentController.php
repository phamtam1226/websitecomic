<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\User;
use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comics = Comic::all();
        return view('admin.pages.comment.index', compact('comics'));
    }
    public function show(Comic $comic, Chapter $chapter)
    {
        $comicid = Comic::find($comic);
        $comment = Comment::where('comic_id', $comic->id)->where('chapter_id', $chapter->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
        //$comment = Comment::all();
        return view('admin.pages.comment.show', compact('comment','comic','chapter'));
    }
    public function showChapter(Comic $comic)
    {
        $chapters = $comic->chapters;
        return view('admin.pages.comment.showChapter', compact('comic', 'chapters'));
    }
    public function showcmtreply(Comic $comic, Chapter $chapter,Comment $comment)
    {
        
        $commentuser = Comment::where('id',$comment->id)->get();
        $cmtreply = CommentReply::where('comment_id', $comment->id)->where('status', 1)->orderBy('created_at', 'desc')->get();
       
        return view('admin.pages.comment.showcmtreply', compact('cmtreply','commentuser','comic','chapter'));
    }
    
    public function destroy(Comic $comic, Chapter $chapter,Comment $comment)
    {
        // Storage::delete($accounts->avatar);
        $comment->delete();

       
        $total= ($comment->total_cmtreply)+1;
        $chapter = Chapter::find($chapter->id);
        $chapter->number_comment=($chapter->number_comment)-$total;
        $chapter->save();

        $comic = Comic::find($comic->id);
        $comic->number_comments= ($comic->number_comments)-$total;
        $comic->save();

        return back();
    }
    public function destroyreply(Comic $comic, Chapter $chapter,Comment $comment, CommentReply $commentreply)
    {
        // Storage::delete($accounts->avatar);
        $commentreply->delete();

        $comment = Comment::find($comment->id);
        $comment->total_cmtreply--;
        $comment->save();

        $chapter = Chapter::find($chapter->id);
        $chapter->number_comment--;
        $chapter->save();

        $comic = Comic::find($comic->id);
        $comic->number_comments--;
        $comic->save();

        return back();
    }
    public function search(Request $request)
    {
        
    }

}
