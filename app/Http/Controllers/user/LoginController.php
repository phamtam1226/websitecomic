<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;

class LoginController extends Controller
{
    //Đăng Nhập
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.index');
        } else {
            return view('login.login');
        }
    }
    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [


                'txtemail' => 'required|email',
                'txtMatKhau' => 'required|min:6|max:20',
            ],
            [


                'txtemail.required' => 'Vui lòng nhập email',
                'txtemail.email' => 'Không đúng định dạng email',
                'txtMatKhau.required' => 'Vui lòng nhập mật khẩu',
                'txtMatKhau.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $login = [
            'email' => $request->txtemail,
            'password' => $request->txtMatKhau,
            'status'    => "1"

        ];

        if (Auth::attempt($login)) {
            $infoUser = ['id' => Auth::User()->id, 'email' => Auth::User()->email, 'name' => Auth::User()->name,'avatar' => Auth::User()->avatar];
            $request->session()->put('infoUser', $infoUser);
            if (Auth::User()->role == 0) {
                return redirect()->route('user.index')->with('message', 'Đăng nhập thành công');
            } else {
                return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập thành công');
            }
        } else {
            return redirect()->back()->with('message', 'email hoặc Password không chính xác');
        }
    }
    //Đăng Ký
    public function Register()
    {
        return view('login.login');
    }
    public function postRegister(Request $request)
    {

        $this->validate(
            $request,
            [

                'name' => 'required',
                'email' => 'required|email|unique:user,email',
                'password' => 'required|min:6|max:20',
                'repassword' => 'required|same:password'
            ],
            [

                'name.required' => 'Vui lòng nhập username',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'email đã tồn tại! Vui lòng nhập emal khác',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.required' => 'Vui lòng xác nhận mật khẩu',
                'repassword.same' => 'Xác nhận mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->status = 1;
        if ($user->save())
            return redirect()->route('getLogin')->with('message', 'Tạo tài khoản thành công!');
    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('infoUser');
        return view('login.login');
    }
    public function index()
    {
        $genres = Genre::all();
        return view('user.pages.usermanagement',compact('genres'));
    }
    public function updateinfomation(Request $request, $id)
    {
        //
        
        $accounts = User::find($id);
        if ($request->avatar == null)  $data['avatar'] = $accounts->avatar;
        else {
            if($accounts->avatar==null){
                $data['avatar'] = $request->file('avatar')->store('public/account');
            }else
            Storage::delete($accounts->avatar);
            $data['avatar'] = $request->file('avatar')->store('public/account');
        }

        $accounts->name = $request['name'];
        $accounts->avatar =  $data['avatar'];

        $accounts->save();
        $request->session()->forget('infoUser');
        $request->session()->put('infoUser', $accounts);
        return redirect()->route('user.account');
    }
    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|Email',
                'password' => 'required|min:6|max:20',
                'repassword' => 'required|same:password'
            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhập Email',
                'email.Email' => 'Không đúng định dạng Email',
                'passwordcu.required' => 'Vui lòng nhập mật khẩu cũ',
                'password.required' => 'Vui lòng nhập mật khẩu mới',
                'repassword.required' => 'Vui lòng xác nhận mật khẩu mới',
                'repassword.same' => 'Xác nhận mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );

        $data['password'] = Hash::make($data['password']);
        if (Hash::check($request['passwordcu'], $user->password)) {
            if ($user->update($data)) {
                return redirect('/')->with('message', 'Cập nhật tài khoản thành công!');
            }
        } else return redirect('/')->with('message', 'Cập nhật tài khoản thất bại!');
    }
}
