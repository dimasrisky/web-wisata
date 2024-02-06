<?php

namespace App\Http\Controllers;
use App\Models\kota;

use Illuminate\Http\Request;
use App\Models\Wisata;

class HomeController{

    // halaman home utama
    public function index(Request $request){
        $data_wisata = $request->query('id') ? Kota::find($request->query('id'))->wisata : Wisata::get();
        if($request->query('search-wisata')){
            $search_wisata = $request->query('search-wisata');
            $data_wisata = Wisata::where('nama', 'LIKE', '%' . $search_wisata . '%')->get();
        }
         return view('daftar-wisata', [
            'title' => 'wisataku.id | Details',
            'data_wisata' => $data_wisata
        ]);
    }

    // halaman details
    public function show(string $id){
         return view('details', [
            'title' => 'wisataku.id | Details',
            'data_wisata' => Wisata::find($id)
        ]);
    }

}
