<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController{

    // form registrasi user
    public function register(){
        return view('register', [
            'title' => 'wisataku.id | Register'
        ]);
    }

    // Menambah user ke database
    public function tambahUser(Request $request){
        User::create([
            'nama' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('login.form');
    }
}