<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\User;

class LandingPageController{
    public function index(){
        $destinasi = Wisata::get();
        $kota = Kota::get();
        $destinasi = Wisata::get();
        $pengguna = User::get();

        return view('landing-page.main', [
            'title' => 'Travelku.id | Home',
            'top_wisata' => Wisata::orderBy('id', 'DESC')->limit(3)->with('kota')->get(),
            'destinasi' => $destinasi,
            'kota' => $kota,
            'pengguna' => $pengguna,
        ]);
    }


    public function about(){
        return view('.landing-page.about', [
            'title' => 'TravelingKuy.id | Tentang kami'
        ]);
    }

    public function daftarKota(Request $request){
        $kota = $request->query('search-kota') ? Kota::where('nama_kota', 'LIKE', '%' . $request->query('search-kota') . '%')->get() : Kota::get();
        return view('landing-page.daftar-kota', [
            'title' => 'TravelingKuy.id | Kota',
            'daftar_kota' => $kota
        ]);
    }
}
