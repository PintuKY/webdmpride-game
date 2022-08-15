<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet_request_widthdrawl;
use App\Mail\UpdateWithdrawlRequestClose;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{

    public function index(Request $request)

    {

        $totalwallet = [100];
        // User::sum('wallet_amount');

        $withdrawal = [100];
        // Withdrawal::sum('amount');

        $total_withdrw_amt = [100];
        // Withdrawal::where('approval',1)->get();

        $balance =
        // $totalwallet - $withdrawal;

        $total_members = User::where('role_id',2)->get();

        return view('admin.home',compact('total_withdrw_amt','total_members','totalwallet','withdrawal','balance'));

    }

    public function show(){

        // $details = Withdrawal::where('approval','0')->orderBy('id', 'DESC')->get();
        $withdrawal_requests = Wallet_request_widthdrawl::where('req_stat','0')->orderBy('id','desc')->paginate(15);
        return view('admin.withdrawal.index',compact('withdrawal_requests'));

    }

    public function Permission(Request $request)
    {
     $id = $request->id;
     $user_id = $request->user_id;
     $status = $request->status;
     $reasons = $request->reasons;
     $amount = $request->amount;
     Wallet_request_widthdrawl::where('id', $id)->update([
             'req_stat'=> $status,
             // 'reasons' => $reasons
     ]);
     if ($request->status == '1') {
         // $add_money_req_dtl = WalletRequest::find($id);
         $user = User::where('id',$user_id)->first();
         $total_amount = ($user->wallet_amount - $amount);
         User::where('id', $user_id)->update([
             'wallet_amount'=>$total_amount
         ]);
         $new_status = 'Approved';
     }
     else{
         $new_status = 'Rejected';
     }

     $user = User::where('id',$user_id)->select('email','id','name')->first();
     try
         {
             $data = [
                 'id' => $user->id,
                 'user_name' =>  $user->name,
                 'request_type' => 'Update Add money Request',
                 'amount' => $amount,
                 'reasons' => $reasons,
                 'new_status' => $new_status
             ];
             Mail::to($user->email)->send(new UpdateWithdrawlRequestClose($data));
         }
             catch (Exception $e)
         {
             return back()->with('flash_success', "Give user permissions successfully mail.");
         }

     return back()->with('flash_success', "Give user permissions successfully.");
    }

    public function ComWithReq(){

        $withdrawal_requests = Wallet_request_widthdrawl::where('req_stat','!=','0')->orderBy('id','desc')->paginate(15);
        return view('admin.withdrawal.requestComplete',compact('withdrawal_requests'));
    }






    public function change_password(){
        $user = User::where('role_id',1)->first();
        return view('admin.admin_password',compact('user'));
    }
    public function update_password(Request $request){
        $this->validate($request, [
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find($request->user_id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('flash_success','Password reset successfully');

    }
}
