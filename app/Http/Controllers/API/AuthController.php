<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    /**
     * 
     * register
     */
    public function Register(Request $request)
    {

        Log::info($request->all());

        $validator=Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails())
        {

            return response(['error'=>$validator->errors()->all()]);

        }

        try{
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->password=bcrypt($request->password);
            $user->save();

            // $user = User::create([
            //     'name' => $request->get('name'),
            //     'email' => $request->get('email'),
            //     'phone' => $request->get('phone'),
            //     'password' => bcrypt($request->get('password'))
            // ]);

            $token = $user->createToken('pintu')->accessToken;

            return response()->json(['token' => $token],  200);
        }
        catch(Exception $e){

                Log::error($e->getMessage());
                return response(['data' => "internal Server error",'error' => true]);

        }   
    }
     /**
     * 
     * login
     * 
     */
    public function login(Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        //return response()->json(['data' => $data], 200);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user(); 
            $token = $user->createToken('pintu')->accessToken;

            return response()->json(['token' => $token], 200);

        } 
        else {

            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

}
