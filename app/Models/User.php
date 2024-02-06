<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model implements AuthenticatableContract{
    use HasFactory, Authenticatable, HasApiTokens;
    
    protected $table = 'users';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'isAdmin'
    ];

    public function banyakPesananUser(){
        return $this->hasMany(Pemesanan::class);
    }
}