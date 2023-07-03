<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'txtemail' => 'required|email',
            'txtMatKhau' => 'required',
        ], [
            'txtemail.required' => 'Vui lòng nhập email',
            'txtMatKhau.required' => 'Vui lòng nhập mật khẩu',
        ]);
    
        // Nếu kiểm tra không thành công
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('form_type', 'login');
        }
    
        // Kiểm tra xem người dùng tồn tại và không bị khóa
        $user = User::where('email', $request->txtemail)->first();
        if ($user) {
            // Kiểm tra xem tài khoản có bị vô hiệu hóa không
            if ($user->status == 0) {
                return back()->withErrors([
                    'account_inactive' => 'Tài khoản của bạn đã bị khoá. Vui lòng liên hệ với quản trị viên.',
                ])->with('form_type', 'login');
            }
    
            // Kiểm tra số lần đăng nhập sai
            if ($user->login_attempts >= 5) {
                // Khóa tài khoản bằng cách thay đổi trạng thái thành 0
                $user->status = 0;
                $user->save();
                return back()->withErrors([
                    'account_locked' => 'Tài khoản của bạn đã bị khoá do nhập sai mật khẩu nhiều lần. Vui lòng liên hệ với quản trị viên.',
                ])->with('form_type', 'login');
            }
    
            // Kiểm tra mật khẩu
            if (!Hash::check($request->txtMatKhau, $user->password)) {
                // Tăng số lần đăng nhập sai
                $user->login_attempts += 1;
                $user->save();
    
                // Mật khẩu không chính xác
                return back()->withInput()->withErrors([
                    'txtMatKhau' => 'Mật khẩu không chính xác. Bạn đã nhập sai ' . $user->login_attempts . ' lần.',
                ])->with('form_type', 'login');
            } else {
                // Mật khẩu chính xác
                $user->login_attempts = 0;  // Đặt lại số lần đăng nhập sai khi đăng nhập thành công
                $user->save();
    
                // Tiếp tục xác thực
                Auth::login($user);
    
                // Lưu thông tin người dùng vào phiên
                $infoUser = ['id' => Auth::User()->id, 'email' => Auth::User()->email, 'name' => Auth::User()->name, 'avatar' => Auth::User()->avatar,'total_coin' => Auth::User()->total_coin];
                $request->session()->put('infoUser', $infoUser);
                
                // Kiểm tra vai trò người dùng và chuyển hướng
                if (Auth::User()->role == 0) {
                    return redirect()->route('user.index')->with('message', 'Đăng nhập thành công');
                } else {
                    return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập thành công');
                }
            }
        } else {
            // Người dùng không tồn tại
            return back()->withErrors([
                'txtemail' => 'Email không chính xác.',
            ])->with('form_type', 'login');
        }
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
