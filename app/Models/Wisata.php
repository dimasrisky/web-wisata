<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model{
    use HasFactory;

    protected $table = 'wisatas';
    protected $fillable = [
        'nama',
        'kota_id',
        'deskripsi',
        'harga_tiket',
        'image'
    ];

    public function kota(){
        return $this->belongsTo(Kota::class);
    }

    public function pesananWisata(){
        return $this->hasMany(Pemesanan::class);
    }
}
