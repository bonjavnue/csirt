<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profil;

class ProfilController extends Controller
{
    public function showProfil()
    {
        $profil = Profil::latest()->first();

        if (!$profil) {
            return view('admin.profil')->with('profil', null);
        }

        return view('admin.profil', compact('profil'));
    }

    public function getProfil()
    {
        $profil = Profil::latest()->first();

        if (!$profil) {
            return response()->json(['gambar' => null, 'deskripsi' => null]);
        }

        return response()->json([
            'gambar' => $profil->gambar,
            'deskripsi' => $profil->deskripsi,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'gambar' => 'required|file|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
            'deskripsi' => 'required|string', // Validasi deskripsi
        ]);

        // Ambil file gambar
        $image = $request->file('gambar');

        // Buat nama file unik berdasarkan MD5 dan ekstensi file
        $extension = $image->getClientOriginalExtension();
        $fileName = md5_file($image->getRealPath()) . '.' . $extension;
        $folderPath = "img/profil/";
        $filePath = $folderPath . $fileName;

        // Simpan file ke direktori storage/public/img/profil
        Storage::disk('public')->putFileAs($folderPath, $image, $fileName);

        // Buat URL file berdasarkan nama file
        $url = asset('storage/' . $filePath);

        // Simpan data ke database
        try {
            Profil::create([
                'gambar' => $fileName, // Nama file
                'deskripsi' => $request->deskripsi, // Deskripsi
                'url' => $url, // URL file
            ]);

            return response()->json(['success' => true, 'message' => 'Profil berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'gambar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Gambar bersifat opsional
            'deskripsi' => 'required|string', // Deskripsi wajib
        ]);

        try {
            // Ambil data profil terakhir berdasarkan ID
            $profil = Profil::latest()->first();

            // Jika tidak ada data profil
            if (!$profil) {
                return response()->json(['success' => false, 'message' => 'Profil tidak ditemukan!'], 404);
            }

            $fileName = $profil->gambar; // Gunakan gambar lama jika tidak ada file baru
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');

                // Hapus gambar lama jika ada
                if (file_exists(public_path('img/profil/' . $profil->gambar))) {
                    unlink(public_path('img/profil/' . $profil->gambar));
                }

                // Buat nama file baru
                $extension = $image->getClientOriginalExtension();
                $fileName = md5_file($image->getRealPath()) . '.' . $extension;

                // Simpan file baru
                $image->move(public_path('img/profil/'), $fileName);
            }

            // URL baru
            $url = asset('img/profil/' . $fileName);

            // Update data di database
            $profil->update([
                'gambar' => $fileName,
                'deskripsi' => $request->deskripsi,
                'url' => $url,
            ]);

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui!'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function destroy() // hapus semua data di tabel
    {
        try {
            // Hapus semua data di tabel 'profils'
            Profil::truncate();
    
            // Kembalikan respon sukses
            return response()->json(['success' => true, 'message' => 'Semua data profil berhasil dihapus!'], 200);
        } catch (\Exception $e) {
            // Tangani error
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
