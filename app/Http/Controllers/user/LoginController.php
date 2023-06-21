<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;
use Carbon\Carbon;
use App\Mail\OTPMail;

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
                $infoUser = ['id' => Auth::User()->id, 'email' => Auth::User()->email, 'name' => Auth::User()->name, 'avatar' => Auth::User()->avatar];
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
    
    
    //Đăng Ký
    public function Register()
    {
        return view('login.login');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'repassword' => 'required|same:password',
            'otp' => 'required|integer'
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã tồn tại! Vui lòng nhập emal khác',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'repassword.required' => 'Vui lòng xác nhận mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại không đúng',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'otp.required' => 'Vui lòng nhập mã OTP',
            'otp.integer' => 'Mã OTP phải là số',
        ]);

        // Nếu xác thực dữ liệu thất bại
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('form_type', 'register');
        }

        $otp = Session::get('OTP');
        $otpExpiration = Session::get('OTP_EXPIRATION');

        if ($request->input('otp') != $otp || !Carbon::now()->lessThan($otpExpiration)) {
            // Xoá OTP khỏi session ngay lập tức nếu nhập sai hoặc OTP hết hạn
            Session::forget('OTP');
            Session::forget('OTP_EXPIRATION');
    
            // Đồng thời trả về lỗi và yêu cầu người dùng yêu cầu OTP mới
            return back()->withInput()->withErrors([
                'otp' => 'OTP không chính xác hoặc đã hết hạn. Vui lòng yêu cầu OTP mới.',
            ])->with('form_type', 'register');
        }

        // Xoá OTP khỏi session
        Session::forget('OTP');
        Session::forget('OTP_EXPIRATION');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->status = 1;

        if ($user->save()) {
            // Đăng ký thành công
            return redirect()->route('getLogin')->with('success', 'Tạo tài khoản thành công!');
        }
    }


    public function sendOtp(Request $request)
    {
        // Xác nhận địa chỉ email
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Tạo một OTP 6 chữ số ngẫu nhiên mới
        $otp = rand(100000, 999999);
    
        // Cập nhật OTP trong phiên với thời hạn mới là 5 phút
        $request->session()->put('OTP', $otp);
        $request->session()->put('OTP_EXPIRATION', Carbon::now()->addMinutes(5));
    
        // Gửi OTP mới tới email của người dùng
        Mail::to($request->email)->send(new OTPMail($otp));
    
        return response()->json([
            'message' => 'Một OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email của bạn.',
        ]);
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
