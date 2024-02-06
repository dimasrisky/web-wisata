<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController{
    public function index(){
        return view('login', [
            'title' => 'TravelingKuy.id | Login'
        ]);
    }

    public function handle(Request $request){
        // Validasi input
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required']
        ]);

        if(auth()->attempt(['nama' => $request->username, 'password' => $request->password ])){
            return redirect()->route('wisata.index')->with('success', 'Anda Berhasil Login');
        }
        
        return back()->with('loginFailed', 'Gagal Login, Pastikan Username dan Password anda benar');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login.form');
    }
}