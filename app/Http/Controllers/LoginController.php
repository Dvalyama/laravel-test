<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view ('login.index');
    }
    public function store(Request $request)
    {
        // $ip=$request->ip();
        // $path=$request->path();

        // dd($ip,$path);

        // $email=$request->input('email');
        // $password=$request->input('password');
        // $remember=$request->boolean('remember');
       
        // dd($email,$password,$remember);

        if(true){
            return redirect()->back()->withInput();
        }

        return redirect()->route('user');
    }

}
