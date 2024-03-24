<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;

class LoginController extends Controller
{
    //Đăng Nhập
    public function getLogin()
    {

        return view('login.login');
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
        $Account = Account::where('email', $request->txtemail)->first();
        if ($Account) {

            // Kiểm tra mật khẩu
            if (!Hash::check($request->txtMatKhau, $Account->password)) {
                // Tăng số lần đăng nhập sai



                // Mật khẩu không chính xác
                return back()->withInput()->withErrors([
                    'txtMatKhau' => 'Mật khẩu không chính xác. Bạn đã nhập sai ',
                ])->with('form_type', 'login');
            } else {


                // Tiếp tục xác thực
                Auth::login($Account);

                // Lưu thông tin người dùng vào phiên
                $infoUser = ['id' => Auth::User()->id, 'email' => Auth::User()->email, 'name' => Auth::User()->name];
                $request->session()->put('infoUser', $infoUser);

                // Kiểm tra vai trò người dùng và chuyển hướng
                if (Auth::User()->role == 0) {
                    return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập thành công');
                } else {
                    if (Auth::User()->role == 1) {
                        return redirect()->route('cashier.index')->with('message', 'Đăng nhập thành công');
                    } else {
                        if (Auth::User()->role == 2) {
                            return redirect()->route('kitchen.index')->with('message', 'Đăng nhập thành công');
                        } else {
                            if (Auth::User()->role == 3) {
                                return redirect()->route('order.index')->with('message', 'Đăng nhập thành công');
                            }
                        }
                    }
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

        return view('Account.pages.Accountmanagement', compact('employee'));
    }
    public function updateinfomation(Request $request, $id)
    {
        //

        $accounts = Account::find($id);
        if ($request->avatar == null)  $data['avatar'] = $accounts->avatar;
        else {
            if ($accounts->avatar == null) {
                $data['avatar'] = $request->file('avatar')->store('public/account');
            } else
                Storage::delete($accounts->avatar);
            $data['avatar'] = $request->file('avatar')->store('public/account');
        }

        $accounts->name = $request['name'];
        $accounts->avatar =  $data['avatar'];

        $accounts->save();
        $request->session()->forget('infoUser');
        $request->session()->put('infoUser', $accounts);
        return redirect()->route('Account.account');
    }
    public function updateAccount(Request $request, $id)
    {
        $Account = Account::find($id);
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
        if (Hash::check($request['passwordcu'], $Account->password)) {
            if ($Account->update($data)) {
                return redirect('/')->with('message', 'Cập nhật tài khoản thành công!');
            }
        } else return redirect('/')->with('message', 'Cập nhật tài khoản thất bại!');
    }
}
