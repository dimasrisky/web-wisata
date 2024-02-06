<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;

class UserApiController{

    public function index(){
        $data = User::get();
        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil didapatkan',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'data tidak ditemukan'
            ], 404);
        }
    }

    public function show($idUser){
        $data = User::where('id', $idUser)->get();
        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil didapatkan',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'data tidak ditemukan'
            ], 404);
        }
    }

    public function store(Request $request){
        $validasiRequest = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if($validasiRequest){
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil ditambahkan'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'data anda tidak valid'
            ], 404);
        }
    }

    public function update(Request $request, $idUser){
        $validasiRequest = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if($validasiRequest){
            User::where('id', $idUser)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil diupdate'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'data anda tidak valid'
            ], 404);
        }
    }

    public function destroy($idUser){
        User::destroy($idUser);
        return response()->json([
            'status' => 200,
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
