<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;


class UserController extends Controller
{
    public function index()
    {

        return view('user.pages.index');
    }
}
