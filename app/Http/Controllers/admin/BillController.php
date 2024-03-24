<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class BillController extends Controller
{
    public function index()
    {
        $bill = Bill::all();
        return view('admin.pages.bill.index', compact('bill'));
    }
}
