<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Nama file gambar default
        $fileName = 'gedung.png'; // Nama file gambar yang sudah ada di storage/public/img/profil
        $folderPath = 'img/profil/'; // Path folder di dalam storage
        $url = asset('storage/' . $folderPath . $fileName); // URL gambar

        // Masukkan data ke tabel 'profils'
        DB::table('profil')->insert([
            'gambar' => $fileName, // Nama file gambar
            'deskripsi' => 'Waskita Computer Security Incident Response Team disingkat Waskita-CSIRT, merupakan tim tanggap insiden siber pada PT Waskita Karya (Persero) Tbk yang ditetapkan oleh direktur Utama dengan dokumen Surat Keputusan Board of Director PT Waskita Karya (Persero) Tbk Nomor : 20/SK/WK/2023.', // Deskripsi default
            'url' => $url, // URL gambar
            'created_at' => now(), // Tanggal dan waktu saat ini
            'updated_at' => now(), // Tanggal dan waktu saat ini
        ]);
    }
}
