<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(){
        $users = User::where('role_id',2)->orderBy('id', 'desc')->paginate(15);
        return view('admin.customers.index',compact('users'));
    }
}
