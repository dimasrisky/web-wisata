<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Kota;

class KotaApiController{
  public function index(){
        $data = Kota::get();
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

    public function show($idKota){
        $data = Kota::where('id', $idKota)->get();
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
            'nama_kota' => ['required'],
        ]);

        if($validasiRequest){
            Kota::create([
                'nama_kota' => $request->nama_kota,
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

    public function update(Request $request, $idKota){
        $validasiRequest = $request->validate([
            'nama_kota' => ['required'],
        ]);
        if($validasiRequest){
            Kota::where('id', $idKota)->update([
                'nama_kota' => $request->nama_kota,
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

    public function destroy($idKota){
        Kota::destroy($idKota);
        return response()->json([
            'status' => 200,
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
