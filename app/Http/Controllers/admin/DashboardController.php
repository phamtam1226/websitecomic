<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use DB;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   
    public function index(){
        return view('admin.pages.dashboard');
    }
}
