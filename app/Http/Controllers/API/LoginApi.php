<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;

class LoginApi{
    public function createToken(Request $request){
        $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);

        if(auth()->attempt(['nama' =>$request->nama, 'password' => $request->password])){
            $user = User::where('nama', $request->nama)->first();
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json([
                "message" => "login sukses",
                "api-token" => $token
            ]);
        }else{
            return response()->json([
                'message' => 'input invalid'
            ]);
        }
    }
}
