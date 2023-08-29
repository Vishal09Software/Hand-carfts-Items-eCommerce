<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use Session;


class AuthCustomController extends Controller
{
    //Register users

    public function register(){
        return view('frontend.register');
    }

    public function registeruser(Request $request)
    {
    $request->validate([
        'name' => 'required|string',
        'mobile' => 'required|regex:/^[0-9]{10}$/|unique:Customers',
        'email' => 'required|email|unique:customers',
        'password' => 'required|string|min:8',
    ]);

    $customers = new Customers([
        'name' => $request->input('name'),
        'mobile' => $request->input('mobile'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    $customers->save();
    return redirect('/login')->with('status','Register Successfully');
    }


    //Login User
    public function login(){
        return view('frontend.login');
    }

    public function userlogin(Request $request)
    {
        $customers = Customers::where('email', '=' ,$request->email)->first();

        if($customers){
            if (Hash::check($request->password, $customers->password)) {
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

    //logout user
    public function logout() {
        if (Session::has('loginId')) {
            Session::pull('loginId');
        return redirect('login');
        }
    }
}
