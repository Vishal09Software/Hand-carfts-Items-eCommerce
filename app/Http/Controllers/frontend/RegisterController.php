<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customers;

class RegisterController extends Controller
{
    public function index(){
        return view('frontend.register');
    }

    public function store(Request $request)
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

}
