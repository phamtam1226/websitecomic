<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách thể loại
        $genres = Genre::all();

        // Trả về view và truyền biến genres
        return view('user.pages.index', compact('genres'));
    }
    public function details(){
        return view('user.pages.details');
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
        return view('user.pages.chapter');
    }
    
}
