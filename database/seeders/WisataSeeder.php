<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wisata::create([
            'kota_id' => 1,
            'nama' => 'Pantai Kuta',
            'deskripsi' => 'Pantai terkenal di Bali dengan ombak ideal untuk berselancar dan pemandangan matahari terbenam.',
            'harga_tiket' => 50000,
            'image' => 'pantai-kuta.jpg'
        ]);

        Wisata::create([
            'kota_id' => 2,
            'nama' => 'Dunia Fantasi (Dufan)',
            'deskripsi' => 'Taman hiburan populer di Jakarta dengan berbagai wahana dan atraksi keluarga.',
            'harga_tiket' => 150000,
            'image' => 'dufan.jpg'
        ]);

        Wisata::create([
            'kota_id' => 3,
            'nama' => 'Candi Borobudur',
            'deskripsi' => 'Candi Buddha terbesar di Magelang, Jawa Tengah, dengan keindahan arsitektur yang luar biasa.',
            'harga_tiket' => 75000,
            'image' => 'borobudur.jpg'
        ]);

        // Wisata::create([
        //     'kota_id' => 4,
        //     'nama' => 'Danau Toba',
        //     'deskripsi' => 'Danau vulkanik terbesar di Sumatera Utara dengan pesona alam yang menakjubkan.',
        //     'harga_tiket' => 40000
        // ]);

        // Wisata::create([
        //     'kota_id' => 5,
        //     'nama' => 'Pulau Komodo',
        //     'deskripsi' => 'Habitat Komodo di Nusa Tenggara Timur, menawarkan keindahan alam bawah laut yang spektakuler.',
        //     'harga_tiket' => 100000
        // ]);

        // Wisata::create([
        //     'kota_id' => 6,
        //     'nama' => 'Taman Nasional Lorentz',
        //     'deskripsi' => 'Taman nasional terbesar di Papua, menampilkan keindahan alam yang masih alami.',
        //     'harga_tiket' => 80000
        // ]);

        // Wisata::create([
        //     'kota_id' => 7,
        //     'nama' => 'Bromo',
        //     'deskripsi' => 'Gunung Bromo, pemandangan alam indah di Jawa Timur dengan panorama matahari terbit yang memesona.',
        //     'harga_tiket' => 60000
        // ]);

        // Wisata::create([
        //     'kota_id' => 8,
        //     'nama' => 'Derawan',
        //     'deskripsi' => 'Destinasi wisata pulau eksotis di Kalimantan Timur dengan panorama bawah laut yang menakjubkan.',
        //     'harga_tiket' => 90000
        // ]);

        // Wisata::create([
        //     'kota_id' => 9,
        //     'nama' => 'Bantimurung',
        //     'deskripsi' => 'Taman nasional di Sulawesi Selatan, memiliki air terjun indah yang menawan.',
        //     'harga_tiket' => 35000
        // ]);

        // Wisata::create([
        //     'kota_id' => 10,
        //     'nama' => 'Keraton Yogyakarta',
        //     'deskripsi' => 'Istana budaya di Yogyakarta yang kaya akan sejarah dan warisan budaya Indonesia.',
        //     'harga_tiket' => 25000
        // ]);
    }
}

