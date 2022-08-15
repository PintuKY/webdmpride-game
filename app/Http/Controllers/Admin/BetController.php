<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bet;
class BetController extends Controller
{
    public function index(){
        $sum_type = Bet::where('bets_type','Sum Type')->get();
        $num_type = Bet::where('bets_type','Sum Number')->get();
        return view('admin.beat.beat',compact('sum_type','num_type'));
    }

    public function CreateForm(){
        return view('admin.beat.crateBet');
    }

    public function Create(Request $request){
        $validate = $request->validate([
            'bets_type' => 'required',
            'bets_color' => 'required',
            'bets_odds' => 'required',
        ]);
        // dd($request->all());
        if($request->bets_sequence) {
            $slug=str_replace(" ","-",strtolower($request->bets_sequence));
        }
        elseif($request->bets_numbers){
            $slug=str_replace(" ","-",strtolower($request->bets_numbers));
        }
        // dd($slug);
        $bet = new Bet;
        $bet->bets_type= $request->bets_type;
        $bet->slug= $slug;
        $bet->bets_sequence= $request->bets_sequence;
        $bet->bets_numbers= $request->bets_numbers;
        $bet->bet_angel = $request->bet_angel;
        $bet->total_angel = 360;
        $bet->bets_color= $request->bets_color;
        $bet->bets_odds= $request->bets_odds;
        $checkSlug = $bet->whereSlug($slug)->exists();

        if(!$checkSlug){
            $bet->save();
            // dd('hi');
            return back()->with('success','upload successful');

        }else{
            // dd('hello');
            return back()->withInput()->with('success','Already Bet Exists');
        }
    }

    public function Edit(Request $request){
        $id = $request->id;
        // dd($id);
        $bet = Bet::where('id',$id)->first();
        return view('admin.beat.EditBet',compact('bet'));
    }

    public function Update(Request $request){

        $id = $request->id;
        $bet = Bet::where('id',$id)->update([
          'bets_odds' => $request->bets_odds,
        ]);
        return redirect()->route('bet.show')->with('success','Bet update successful');

    }

    public function BetRecord(){
        return view('admin.beat.BeatRecord');
    }
}
