<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\PasswordReset as PR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{


    // use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {

        dd('ok');
        $title = 'Reset Password';
        $email = session('fpass_email');
        $token = session()->has('token') ? session('token') : $token;
        if (PR::where('token', $token)->where('email', $email)->count() != 1) {

            return redirect()->route('password.request')->with('error','Invalid Token');
        }
        return view('auth.passwords.reset',compact('title','token','email'));
        // return view('auth.passwords.reset')->with(
        //     ['token' => $token, 'email' => $request->email]
        // );
    }

    public function reset(Request $request)
    {

        dd($request->all());
        session()->put('fpass_email', $request->email);
        $request->validate($this->rules(), $this->validationErrorMessages());
        $reset = PR::where('token', $request->token)->orderBy('created_at', 'desc')->first();
        if (!$reset) {
            $notify[] = ['error', 'Invalid Verification Code'];
            return redirect()->route('
            login')->withNotify($notify);
        }

        $user = User::where('email', $reset->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // $general = GeneralSetting::first(['en', 'sn']);



        // send_email($user, 'PASS_RESET_DONE', [
        //     'operating_system' => @$userAgent['os_platform'],
        //     'browser' => @$userAgent['browser'],
        //     'ip' => @$userAgent['ip'],
        //     'time' => @$userAgent['time']
        // ]);


        return redirect()->route('login')->with('success','Password changed');
    }

}
