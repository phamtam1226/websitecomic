<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.pages.index');
    }
    public function details(){
        return view('user.pages.details');
    }
    public function timtruyen(){
        return view('user.pages.findcomic');
    }
    public function history(){
        return view('user.pages.history');
    }
    public function chapter(){
        return view('user.pages.chapter');
    }
}
