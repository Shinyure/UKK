<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controller;
use Illuminate\Http\Request;

class SessionController 
{
    public function index(){
        return view ('sesi/index');
    }
    public function login (Request $request){
        Session::flash('email',$request->email);

        $request->validate ([
            'email'=>'required',
            'password'=>'required',
        ]);
        [
            'email'=>'Insert Email!',
            'password'=>'Insert Password!',
        ];

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect('absensi')->with('success','Selamat Datang');
        } else {
            return redirect('sesi')->with('failed','Username or Password incorrect');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('sesi')->with('success');
    }
}
