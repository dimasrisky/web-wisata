<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kota;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kota::create([
            'nama_kota' => 'Bali',
            'image' => 'bali.svg'
        ]);

        Kota::create([
            'nama_kota' => 'DKI Jakarta',
            'image' => 'jakarta.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Jawa Tengah',
            'image' => 'jawa-tengah.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Sumatera Utara',
            'image' => 'sumatera-utara.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Nusa Tenggara Timur',
            'image' => 'nusa-tenggara-timur.png'
        ]);

        Kota::create([
            'nama_kota' => 'Papua',
            'image' => 'papua.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Jawa Timur',
            'image' => 'jawa-timur.png'
        ]);

        Kota::create([
            'nama_kota' => 'Kalimantan Timur',
            'image' => 'kalimantan-timur.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Sulawesi Selatan',
            'image' => 'sulawesi-selatan.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Yogyakarta',
            'image' => 'yogyakarta.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Nusa Tenggara Barat',
            'image' => 'nusa-tenggara-barat.svg'
        ]);

        Kota::create([
            'nama_kota' => 'Jawa Barat',
            'image' => 'jawa-barat.svg'
        ]);
    }
}
