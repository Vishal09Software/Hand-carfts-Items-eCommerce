<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }

    public function userlogin(Request $request)
    {
        $customers = Customers::where('email', '=' ,$request->email)->first();

        if($customers){
            if(Hash::check($request->password, $customers->password))
            {
                $request->session()->put('loginId', $customers->id);
                return redirect('/');
            }
            else{
                return back()->with('status', 'Password Not Match');
            }
        }
        else{
            return back()->with('status', 'Invalid credentials.');
        }
}

}
