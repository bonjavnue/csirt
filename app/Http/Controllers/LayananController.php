<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    // Menampilkan data layanan
    public function show(Request $request)
    {
        // Mengambil semua data layanan dari database
        $layanan = Layanan::all();
        
        // Jika permintaan adalah AJAX, kembalikan data dalam format JSON
        if ($request->ajax()) {
            return response()->json(['layanan' => $layanan]);
        }

        // Jika bukan AJAX, kembalikan tampilan dengan data layanan
        return view('admin.layanan', compact('layanan'));
    }

    // Menyimpan data layanan
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_layanan' => 'required|string',
        ]);

        // Simpan data layanan ke database
        $layanan = new Layanan();
        $layanan->jenis_layanan = $request->jenis_layanan;
        $layanan->save();

        // Kembalikan respons dalam format JSON
        return response()->json(['success' => true]);
        //
    }
 
    // Mengupdate data layanan berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jenis_layanan' => 'required|string',
        ]);

        // Cari data layanan berdasarkan ID
        $layanan = Layanan::find($id);
        if ($layanan) {
            // Update data layanan
            $layanan->jenis_layanan = $request->jenis_layanan;
            $layanan->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


    // Menghapus data layanan berdasarkan ID
    public function delete($id)
    {
        // Cari data layanan berdasarkan ID
        $layanan = Layanan::find($id);
        if ($layanan) {
            // Hapus data layanan
            $layanan->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
