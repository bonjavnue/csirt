<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visi;
use App\Models\Misi;

class VisiController extends Controller
{
    // Menampilkan data visi dan misi
    public function show(Request $request)
    {
        // Mengambil semua data visi dan misi dari database
        $visi = Visi::all();
        $misi = Misi::all();
        
        // Jika permintaan adalah AJAX, kembalikan data dalam format JSON
        if ($request->ajax()) {
            return response()->json(['visi' => $visi, 'misi' => $misi]);
        }

        // Jika bukan AJAX, kembalikan tampilan dengan data visi dan misi
        return view('admin.tkvisi', compact('visi', 'misi'));
    }

    // Menyimpan data visi dan misi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        // Jika ada input visi, simpan ke database
        if ($request->visi) {
            $visi = new Visi();
            $visi->visi = $request->visi;
            $visi->save();
        }

        // Jika ada input misi, simpan ke database         
        if ($request->misi) {
            $misi = new Misi();
            $misi->misi = $request->misi;
            $misi->save();
        }

        // Kembalikan respons dalam format JSON
        return response()->json(['success' => true]);
        //
    }

        /**
     * Get the latest data from the database.
     */
    // public function getLatest()
    // {
    //     $visi = Visi::all();
    //     $misi = Misi::all();
    //     return response()->json(['visi' => $visi, 'misi' => $misi]);
    // }
 
    // Mengupdate data visi berdasarkan ID
    public function updateVisi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'visi' => 'required|string',
        ]);

        // Cari data visi berdasarkan ID
        $visi = Visi::find($id);
        if ($visi) {
            // Update data visi
            $visi->visi = $request->visi;
            $visi->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // Mengupdate data misi berdasarkan ID
    public function updateMisi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'misi' => 'required|string',
        ]);

        // Cari data misi berdasarkan ID
        $misi = Misi::find($id);
        if ($misi) {
            // Update data misi
            $misi->misi = $request->misi;
            $misi->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // Menghapus data visi berdasarkan ID
    public function deleteVisi($id)
    {
        // Cari data visi berdasarkan ID
        $visi = Visi::find($id);
        if ($visi) {
            // Hapus data visi
            $visi->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // Menghapus data misi berdasarkan ID
    public function deleteMisi($id)
    {
        // Cari data misi berdasarkan ID
        $misi = Misi::find($id);
        if ($misi) {
            // Hapus data misi
            $misi->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
