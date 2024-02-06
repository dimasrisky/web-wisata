<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\User;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\PDF;

class PemesananController{
    
    public function show($id){
        return view('form-pesanan', [
            'title' => 'wisataku.id | Pesan',
            'data_wisata' => Wisata::find($id),
        ]);
    }

    public function store(Request $request){
        $user = User::where('nama', $request->pemilik)->first();
        $wisata = Wisata::where('nama', $request->wisata)->first();

        Pemesanan::create([
            'wisata_id' => $wisata->id,
            'user_id' => $user->id,
            'harga' => $request->harga_satuan,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $request->harga_satuan * $request->jumlah_tiket
        ]);

        return redirect()->route('cetakTiket', [
            "pemilik" => $request->pemilik, 
            "destinasi" => $request->wisata , 
            "jumlah_tiket" => $request->jumlah_tiket, 
            "total_harga" => $request->harga_satuan * $request->jumlah_tiket 
        ]);
    }

    public function cetakTiket(Request $request){
        $pdf = PDF::loadView('pdf-view.tiket', [
            'pemilik' => $request->query('pemilik'),
            'destinasi' => $request->query('destinasi'),
            'jumlah_tiket' => $request->query('jumlah_tiket'),
            'total_harga' => $request->query('total_harga'),
        ]);

        return $pdf->download('tiket.pdf');
    }
}
