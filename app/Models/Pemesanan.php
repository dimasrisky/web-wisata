<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'wisata_id',
        'user_id',
        'harga',
        'jumlah_tiket',
        'total_harga'
    ];

    public function pemilikPesanan(){
        return $this->belongsTo(User::class);
    }

    public function wisata(){
        return $this->belongsTo(Wisata::class);
    }

}
