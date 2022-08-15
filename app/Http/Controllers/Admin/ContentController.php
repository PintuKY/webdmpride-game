<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppContent;
class ContentController extends Controller
{
   public function Content(){

    $app_contents = AppContent::get();
    return view('admin.AppContent.content',compact('app_contents'));
   }

   public function ContentCreate()
   {
    return view('admin.AppContent.contentCreate');
   }

   public function ContentStore(Request $request)
   {
       $validate = $request->validate([
           'con_type' => 'required',
           'app_content' => 'required',
           'status' => 'required',
       ]);
       $slug = str_replace(" ", "-", strtolower($request->con_type));

       $content = new AppContent;
       $content->con_type = $request->con_type;
       $content->app_content = $request->app_content;
       $content->slug = $slug;
       $content->status = $request->status;
       $checkSlug = $content->whereSlug($slug)->exists();
       if (!$checkSlug) {
           $content->save();
           return redirect()->route('app.content')->with('success', 'App Content Add successful');
       } else {
           return back()->withInput()->with('success', 'Already Content Exists');
       }
   }

   public function Editcontent(Request $request)
   {
       $id = $request->id;
       $content = AppContent::find($id);
       return view('admin.AppContent.EditAppContent', compact('content'));
   }

   public function Update(Request $request)
   {

       $id = $request->id;
       $validate = $request->validate([
        'con_type' => 'required',
        'app_content' => 'required',
        'status' => 'required',
       ]);

       $content = AppContent::find($id);
       $content->app_content = $request->app_content;
       $content->status = $request->status;
       $content->save();

       return redirect()->route('app.content')->withInput()->with('success', 'App Content Update Successfuly' );

   }

}
