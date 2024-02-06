<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataApiController
{
   public function index(){
        $data = Wisata::get();
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

    public function show($idWisata){
        $data = Wisata::where('id', $idWisata)->get();
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
            'kota_id' => ['required'],
            'deskripsi' => ['required'],
            'harga_tiket' => ['required'],
            'image' => ['required']
        ]);

        if($validasiRequest){
            Wisata::create([
                'nama' => $request->nama,
                'kota_id' => $request->kota_id,
                'deskripsi' => $request->deskripsi,
                'harga_tiket' => $request->harga_tiket,
                'image' => $request->image
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

    public function update(Request $request, $idWisata){
        $validasiRequest = $request->validate([
            'nama' => ['required'],
            'kota_id' => ['required'],
            'deskripsi' => ['required'],
            'harga_tiket' => ['required'],
            'image' => ['required']
        ]);
        if($validasiRequest){
            Wisata::where('id', $idWisata)->update([
                'nama' => $request->nama,
                'kota_id' => $request->kota_id,
                'deskripsi' => $request->deskripsi,
                'harga_tiket' => $request->harga_tiket,
                'image' => $request->image
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

    public function destroy($idWisata){
        Wisata::destroy($idWisata);
        return response()->json([
             'status' => 200,
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
