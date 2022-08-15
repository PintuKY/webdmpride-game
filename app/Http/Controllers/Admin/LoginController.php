<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
		$title = 'Login | Roofingtape';
		return view('admin.auth.login',compact('title'));
    }

    public function login(Request $request)
    {
        // dd($request->all());
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
        	'email' => $request['email'],
        	'password' => $request['password'],
	    ];
	    if (Auth::attempt($credentials)) {
		    if (Auth::user()->role->name == "Admin") {
		    	return redirect()->route('adminHome');
		    }
		    if (Auth::user()->role->name == "User") {
                Auth::logout();
                return back()->with('flash_error', 'Email, Password is incorrect');
            }
	    }
	    else{
	    	return back()->with('flash_error', 'Email, Password is incorrect');
	    }
    }

    public function logout(){
    	Auth::logout();
  		return redirect('/admin/login');
    }
}
