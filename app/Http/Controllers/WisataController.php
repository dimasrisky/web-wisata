<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\kota;

class WisataController{

    // * Bagian Dashboard Admin ->>

    // List daftar wisata di bagian dashboard
    public function index(){
        return view('dashboard.daftar-wisata', [
            'title' => 'Dashboard | Daftar Wisata',
            'data_wisata' =>  Wisata::with('kota')->get(),
        ]);
    }

    // form untuk menambah data wisata (dashboard)
    public function create(){
        return view('dashboard.tambah-wisata', [
            'title' => 'Dashboard | Tambah Wisata',
            'data_kota' => Kota::all()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'kota' => ['required'],
            'nama_wisata' => ['required'],
            'deskripsi' => ['required'],
            'harga_tiket' => ['required'],
            'image' => ['required'],
        ]);

        $request->file('image')->move(public_path('/assets/img'), $request->file('image')->getClientOriginalName());

        Wisata::create([
            'kota_id' => $request->kota,
            'nama' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'harga_tiket' => $request->harga_tiket,
            'image' => $request->file('image')->getClientOriginalName()
        ]);
        return redirect()->route('wisata.index');

    }

    
    // form untuk mengupdate Data Wisata
    public function edit(string $id){
        return view('dashboard.update-wisata', [
            'title' => 'Dashboard | Update Data Wisata',
            'data_wisata' => Wisata::find($id),
            'data_kota' => Kota::all()
        ]);
    }

    // update hasil inputan form ke tabel wisata
    public function update(Request $request, string $id){
        // memindahkan file dan menghapus file lama jika asmin mengupdate gambar dengan yang baru
        $request->validate([
            'kota' => ['required'],
            'nama_wisata' => ['required'],
            'deskripsi' => ['required'],
            'harga_tiket' => ['required'],
        ]);
        
        if($request->hasFile('image')){
            $request->file('image')->move(public_path('/assets/img'), $request->file('image')->getClientOriginalName());
            unlink(public_path('/assets/img/' . $request->oldImage));
        }
        
        Wisata::where('id', $id)->update([
            'kota_id' => $request->kota,
            'nama' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'harga_tiket' => $request->harga_tiket,
            'image' => $request->hasFile('image') ? $request->image->getClientOriginalName() : $request->oldImage
        ]);
        return redirect()->route('wisata.index');
    }
    
    // menghapus data dari tabel wisata
    public function destroy(string $id){
        Wisata::destroy($id);
        return redirect()->route('wisata.index');
    }
}
