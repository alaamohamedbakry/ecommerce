<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function sendpasswordresetlink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers,email'
        ]);
        
        // تفاصيل العميل
        $customer = Customer::where('email', $request->email)->first();

        // توليد رمز
        $token = base64_encode(Str::random(64));

        // التحقق من وجود رمز إعادة تعيين كلمة المرور
        $oldtoken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if ($oldtoken) {
            // تحديث الرمز
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            // إضافة رمز جديد
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        $actionlink = route('reset-password', ['token' => $token, 'email' => $request->email]);

        $data = array(
            'actionlink' => $actionlink,
            'customer' => $customer
        );
        $mail_body = view('front.forgot-mail-templates', $data)->render();

        $mail_config = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $customer->email,
            'mail_recipient_name' => $customer->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );
        if (sendemail($mail_config)) {
            session()->flash('success', 'تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني');
            return redirect()->route('forget-password');
        } else {
            session()->flash('fail', 'حدث خطأ ما، يرجى المحاولة مرة أخرى');
            return redirect()->route('forget-password');
        }
    }
}
