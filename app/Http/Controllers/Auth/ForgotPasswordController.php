<?php

namespace App\Http\Controllers\Auth;

use App\User;

use App\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        $title = 'Reset Password';
        return view('auth.passwords.email',compact('title'));
    }

    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error','User not found');
        }

        PasswordReset::where('email', $user->email)->delete();
        $code = verificationCode(6);
        PasswordReset::create([
            'email' => $user->email,
            'token' => $code,
            'created_at' => \Carbon\Carbon::now(),
        ]);

        //email noti
        // send_email($user, 'PASS_RESET_CODE', [
        //     'code' => $code,
        //     'operating_system' => @$userAgent['os_platform'],
        //     'browser' => @$userAgent['browser'],
        //     'ip' => @$userAgent['ip'],
        //     'time' => @$userAgent['time']
        // ]);

        $email = $user->email;
        session()->put('pass_res_mail',$email);
        return redirect()->route('password.code_verify')->with('success','Password reset email sent successfully');
    }

    public function codeVerify(){
        $title = 'Account Recovery';
        $email = session()->get('pass_res_mail');
        if (!$email) {

            return redirect()->route('password.request')->with('error','Opps! session expired');
        }
        return view('auth.passwords.code_verify',compact('title','email'));
    }

    public function verifyCode(Request $request)
    {
        
        $request->validate(['code' => 'required', 'email' => 'required']);
        $code = $request->code;

        if (PasswordReset::where('token', $code)->where('email', $request->email)->count() != 1) {

            return redirect()->route('password.request')->with('error','Invalid token');
        }
        session()->flash('fpass_email', $request->email);
        return redirect()->route('password.reset', $code)->with('success','You can change your password.');
    }

}
