<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\OTPMail;

class RegisterController extends Controller
{
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

    public function sendOtp(Request $request, $isForgotPassword = false)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không nếu đây là quá trình quên mật khẩu
        if ($isForgotPassword) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json([
                    'error' => 'Email này không tồn tại trong hệ thống của chúng tôi.',
                ], 400);
            }
        }

        $otp = rand(100000, 999999);

        $request->session()->put('OTP', $otp);
        $request->session()->put('OTP_EXPIRATION', Carbon::now()->addMinutes(5));

        Mail::to($request->email)->send(new OTPMail($otp));

        return response()->json([
            'message' => 'Một OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email để xác nhận.',
        ]);
    }
}
