<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use Hash;
use DB;
class forgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
       return view('admin.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
    {


        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        Mail::send('admin.mail.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link. Please Check Your Email');
    }

    public function showResetPasswordForm($token) {
        return view('admin.forgotPasswordLink', ['token' => $token]);
     }


     public function submitResetPasswordForm(Request $request)
     {

         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|confirmed',
             'password_confirmation' => 'required'
         ]);
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email,
                               'token' => $request->token
                             ])
                             ->first();

         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }

         $user = DB::table('users')->where('email', $request->email)
                     ->update([
                         'password' => Hash::make($request->password),
                        //  'user_p_pass' => $request->password
                        ]);
         DB::table('password_resets')->where(['email'=> $request->email])->delete();

         return redirect()->route('admin.login')->with('status', 'Your password has been changed!');
     }


}
