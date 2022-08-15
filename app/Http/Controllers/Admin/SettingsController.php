<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class SettingsController extends Controller
{
   public function index(){
    return view('admin.settings.create');
   }

   public function UpdateProfile(){
    $user = User::where('id',Auth::user()->id)->first();
    return view('admin.settings.UpdateProfile',compact('user'));
   }

   public function UpdateProfileDetails(Request $request){
    $id = $request->user_id;
    $validate = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'profile_photo' => 'required',
    ]);

    $img_file = User::where('id',$id)->first();

    if($request->file('profile_photo') != "" && $img_file->profile_photo != "")
    {

        unlink(storage_path('app/public/ProfilePic/'.$img_file->profile_photo));
        $profile_photos = $request->file('profile_photo')->getClientOriginalName();
        $profile_photos_new_name = substr($profile_photos,0,strpos($profile_photos,'.'));

        $file = $request->file('profile_photo');
        $filename = $profile_photos_new_name.'_' . rand().'.'. $file->getClientOriginalExtension();
        $store = Storage::disk('public')->put('ProfilePic/'.$filename, file_get_contents($file),'public');

    }
    elseif($request->file('profile_photo') != "")
    {
        $profile_photos = $request->file('profile_photo')->getClientOriginalName();
        $profile_photos_new_name = substr($profile_photos,0,strpos($profile_photos,'.'));

        $file = $request->file('profile_photo');
        $filename = $profile_photos_new_name.'_' . rand().'.'. $file->getClientOriginalExtension();
        $store = Storage::disk('public')->put('ProfilePic/'.$filename, file_get_contents($file),'public');
    }
    elseif($request->file('profile_photo') == "")
    {
        $filename = $img_file->profile_photo;
    }

    $update_profile = User::where('id',$id)->update([
        'name'=> $request->name,
        'phone'=> $request->phone,
        'email'=> $request->email,
        'profile_photo'=> $filename
    ]);

    return back()->withInput()->with('success', 'Profile Update Successfuly' );
   }


   public function UpdateBank(){
    $user = User::where('id',Auth::user()->id)->first();
    return view('admin.settings.UpdateBankOrUpi',compact('user'));
   }

   public function UpdateBankDetails(Request $request){
    $id = $request->user_id;
    $validate = $request->validate([
        'upi_holder_name' => 'required',
        'upi_id' => 'required',
    ]);

    $update_profile = User::where('id',$id)->update([
        'upi_holder_name'=> $request->upi_holder_name,
        'upi_id'=> $request->upi_id,
    ]);
    return back()->withInput()->with('success', 'UPI details Update Successfuly' );
   }




   public function TestGame(){
    return view('test');
   }
}
