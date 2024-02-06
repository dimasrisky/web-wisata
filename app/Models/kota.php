<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $table = 'kotas';
    protected $fillable = [
        'nama_kota',
    ];

    public function wisata(){
        return $this->hasMany(Wisata::class);
    }
}