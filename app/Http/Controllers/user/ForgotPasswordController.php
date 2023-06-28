<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\NewPasswordMail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = $this->sendOtp($request, true);

        if ($response->status() === 400) {
            return back()->withErrors([
                'email' => 'Email này không tồn tại trong hệ thống của chúng tôi.',
            ])->with('form_type', 'forgot-password');
        }

        return back()->withInput()->with('form_type', 'forgot-password');
    }

    public function postResetPassword(Request $request)
    {
        $otp = Session::get('OTP');
        $otpExpiration = Session::get('OTP_EXPIRATION');

        if ($request->input('otp') != $otp || !Carbon::now()->lessThan($otpExpiration)) {
            // Xoá OTP khỏi session ngay lập tức nếu nhập sai hoặc OTP hết hạn
            Session::forget('OTP');
            Session::forget('OTP_EXPIRATION');
    
            // Đồng thời trả về lỗi và yêu cầu người dùng yêu cầu OTP mới
            return back()->withInput()->withErrors([
                'otp' => 'OTP không chính xác hoặc đã hết hạn. Vui lòng yêu cầu OTP mới.',
            ])->with('form_type', 'forgot-password');
        }

        // Tạo mật khẩu mới và gửi tới email người dùng
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $newPassword = Str::random(6); // tạo mật khẩu ngẫu nhiên
            $user->password = Hash::make($newPassword);
            $user->save();
            Mail::to($request->email)->send(new NewPasswordMail($newPassword));
            return response()->json([
                'success' => true,
                'message' => 'Mật khẩu mới đã được gửi tới email của bạn.',
            ]);
        } else {
            return back()->withErrors([
                'email' => 'Email này không tồn tại trong hệ thống của chúng tôi.',
            ])->with('form_type', 'forgot-password');
        }
    }
}
