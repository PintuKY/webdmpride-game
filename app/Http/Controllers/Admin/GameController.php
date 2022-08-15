<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::where('status', '1')->first();
        return view('admin.Game.game', compact('games'));
    }

    public function CreateForm()
    {

        return view('admin.Game.crateGame');
    }

    public function Create(Request $request)
    {
        $validate = $request->validate([
            'game_name' => 'required',
            'game_img' => 'required',
            'cursor_img' => 'required',
            'game_time' =>  'required'
        ]);
        $slug = str_replace(" ", "-", strtolower($request->game_name));

        $game = new Game;
        $game->game_name = $request->game_name;
        $game->slug = $slug;
        $game->status = $request->status;
        $game->game_time = $request->game_time;
        $checkSlug = $game->whereSlug($slug)->exists();

        $img = $request->file('game_img')->getClientOriginalName();
        $imgs_new_name = substr($img, 0, strpos($img, '.'));

        $cursor_img = $request->file('cursor_img')->getClientOriginalName();
        $cursor_imgs_new_name = substr($cursor_img, 0, strpos($cursor_img, '.'));

        if (!$checkSlug) {
            if ($request->hasFile('game_img') && $request->hasFile('cursor_img')) {
                $file = $request->file('game_img');
                $filename = $imgs_new_name . '_' . rand() . '.' . $file->getClientOriginalExtension();
                $store = Storage::disk('public')->put('GameImg/' . $filename, file_get_contents($file), 'public');


                $file2 = $request->file('cursor_img');
                $filename2 = $cursor_imgs_new_name . '_' . rand() . '.' . $file->getClientOriginalExtension();
                $store = Storage::disk('public')->put('GameImg/' . $filename2, file_get_contents($file2), 'public');
            }
            $game->game_img = $filename;
            $game->cursor_img = $filename2;
            $game->save();
            return back()->with('success', 'upload successful');
        } else {
            return back()->withInput()->with('success', 'Already Game Exists');
        }
    }

    public function EditGame(Request $request)
    {
        $id = $request->id;
        $games = Game::where('id', $id)->first();
        return view('admin.Game.EditGame', compact('games'));
    }

    public function Update(Request $request)
    {

        $id = $request->id;
        $validate = $request->validate([
            'game_name' => 'required',
            'game_time' =>  'required'
        ]);


        $img_file = Game::find($id);

        if($request->game_img){
            unlink(storage_path('app/public/GameImg/' . $img_file->game_img));
            $game_imgs = $request->file('game_img')->getClientOriginalName();
            $game_imgs_new_name = substr($game_imgs, 0, strpos($game_imgs, '.'));

            $file = $request->file('game_img');
            $filename = $game_imgs_new_name . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $store = Storage::disk('public')->put('GameImg/' . $filename, file_get_contents($file), 'public');
            $img_file->game_img = $filename;
        }
        if($request->cursor_img){
            unlink(storage_path('app/public/GameImg/' . $img_file->cursor_img));
            $cursor_imgs = $request->file('cursor_img')->getClientOriginalName();
            $cursor_imgs_new_name = substr($cursor_imgs, 0, strpos($cursor_imgs, '.'));

            $file1 = $request->file('cursor_img');
            $filename1 = $cursor_imgs_new_name . '_' . rand() . '.' . $file1->getClientOriginalExtension();
            $store = Storage::disk('public')->put('GameImg/' . $filename1, file_get_contents($file1), 'public');
            $img_file->cursor_img = $filename1;
        }
        $img_file->game_time = $request->game_time;
        $img_file->status = $request->status;
        $img_file->save();

        return redirect()->route('game.show')->withInput()->with('success', 'Game Update Successfuly' );

    }
}
