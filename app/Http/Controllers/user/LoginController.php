<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TheLoaiCha;
use App\Models\HoaDonBan;
use App\Models\MaGiamGia;
use App\Models\ChiTietHoaDonBan;
use App\Models\TheLoai;
use App\Models\Kho;
use App\Models\Cart;
use App\Classes\Helper;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //Đăng Nhập
    public function login(){
        return view('login.login');
    }
   
}
