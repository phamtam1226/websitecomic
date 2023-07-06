<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChapterBill;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class OrderController extends Controller
{
    public function index()
    {
        $order = ChapterBill::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.order.index', compact('order'));
    }
   

    
}
