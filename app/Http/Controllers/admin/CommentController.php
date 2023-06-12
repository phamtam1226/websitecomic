<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comment = Comment::all();
        return view('admin.pages.comment.index', compact('comment'));
    } public function destroy(Comment $comment)
    {
        // Storage::delete($accounts->avatar);
        $comment->delete();

        return redirect()->route('admin.comment.index');
    }
    public function search(Request $request)
    {
        
    }

}
