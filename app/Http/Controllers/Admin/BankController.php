<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\UpdateBankRequestClose;


class BankController extends Controller
{
    public function Show()
    {
        $bank_requests = BankRequest::where(function ($query) {
            $query->orWhere('bank_status', '0')
                ->orWhere('upi_status', '0');
        })->orderBy('id', 'desc')->paginate(15);

        // ('bank_status','0')->orderBy('id','desc')->paginate(15);
        return view('admin.bank.BankRequest', compact('bank_requests'));
    }


    public function Permission(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $status = $request->status;
        $reasons = $request->reasons;
        $new_status = 'Rejected';

        $check = BankRequest::find($id);
        if ($check->bank_name != '') {
            BankRequest::where('id', $id)->update([
                'bank_status' => $status,
                'upi_status' => $status,
            ]);
            if ($request->status == '1') {
                $req_dtl = BankRequest::find($id);
                $user = User::where('id', $user_id)->first();
                User::where('id', $user_id)->update([
                    'account_hol_name' => $req_dtl->account_hol_name,
                    'bank_name' => $req_dtl->bank_name,
                    'bank_branch' => $req_dtl->bank_branch,
                    'ifsc_code' => $req_dtl->ifsc_code,
                    'bank_account_no' => $req_dtl->bank_account_no,
                    'trans_pin' => $req_dtl->trans_pin,
                    'bank_status' => $req_dtl->bank_status,
                ]);
                $new_status = 'Approved';
            }


        }
        if($check->upi_id != '') {
            BankRequest::where('id', $id)->update([
                'upi_status' => $status,
                'bank_status' => $status,
            ]);
            if ($request->status == '1') {
                $req_dtl = BankRequest::find($id);
                $user = User::where('id', $user_id)->first();
                User::where('id', $user_id)->update([
                    'trans_pin' => $req_dtl->trans_pin,
                    'upi_id' => $req_dtl->upi_id,
                    'upi_holder_name' => $req_dtl->upi_holder_name,
                    'upi_status' => $req_dtl->upi_status,
                ]);
                $new_status = 'Approved';
            }

        }

        $user = User::where('id', $user_id)->select('email', 'id', 'name')->first();
        try {
            $data = [
                'id' => $user->id,
                'user_name' =>  $user->name,
                'request_type' => 'Update Bank or UPI Request',
                'reasons' => $reasons,
                'new_status' => $new_status
            ];
            Mail::to($user->email)->send(new UpdateBankRequestClose($data));
        } catch (Exception $e) {
            return back()->with('flash_success', "Give user permissions successfully mail.");
        }

        return back()->with('flash_success', "Give user permissions successfully.");
    }

    public function ComReq()
    {
        $bank_requests = BankRequest::where(function ($query) {
            $query->orWhere('bank_status', '!=', '0')
                ->orWhere('upi_status', '!=', '0');
        })->orderBy('id', 'desc')->paginate(15);
        // where('bank_status','!=','0')->orderBy('id','desc')->paginate(15);
        return view('admin.bank.BankRequestCompleted', compact('bank_requests'));
    }
}
