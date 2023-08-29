<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use Session;

class UserDashboardController extends Controller
{
    public function index(){
        return view('frontend.my-account');
    }
    public function userdashboard(){
        $customer = null;
        if(Session::has('loginId')){
            $customer = Customers::find(Session::get('loginId'));
        }
        return view('frontend.my-account', compact('customer'));
    }
}
