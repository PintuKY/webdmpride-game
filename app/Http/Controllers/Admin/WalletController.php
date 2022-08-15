<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletRequest;
use Illuminate\Http\Request;
use App\Mail\UpdateMoneyRequestClose;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class WalletController extends Controller
{
   public function Show(){

    $wallet_requests = WalletRequest::where('req_stat','0')->orderBy('id','desc')->paginate(15);
    return view('admin.WalletRequest.addWalletRequest',compact('wallet_requests'));
   }

   public function ComReq(){

    $wallet_requests = WalletRequest::where('req_stat','!=','0')->orderBy('id','desc')->paginate(15);
    return view('admin.WalletRequest.addWalletRequestComplete',compact('wallet_requests'));
   }

   public function Permission(Request $request)
   {
    $id = $request->id;
    $user_id = $request->user_id;
    $status = $request->status;
    $reasons = $request->reasons;
    $amount = $request->amount;
    WalletRequest::where('id', $id)->update([
            'req_stat'=> $status,
            // 'reasons' => $reasons
    ]);
    if ($request->status == '1') {
        // $add_money_req_dtl = WalletRequest::find($id);
        $user = User::where('id',$user_id)->first();
        $total_amount = ($user->wallet_amount + $amount);
        User::where('id', $user_id)->update([
            'wallet_amount'=> $total_amount,
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
            Mail::to($user->email)->send(new UpdateMoneyRequestClose($data));
        }
            catch (Exception $e)
        {
            return back()->with('flash_success', "Give user permissions successfully mail.");
        }

    return back()->with('flash_success', "Give user permissions successfully.");
   }
}

