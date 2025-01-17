<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;

class AcaraController extends Controller
{
    // Menampilkan data acara
    public function show(Request $request)
    {
        // Mengambil semua data acara dari database
        $acara = Acara::all();
        
        // Jika permintaan adalah AJAX, kembalikan data dalam format JSON
        if ($request->ajax()) {
            return response()->json(['acara' => $acara]);
        }

        // Jika bukan AJAX, kembalikan tampilan dengan data acara
        return view('admin.acara', compact('acara'));
    }

    // Menyimpan data acara
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'tempat' => 'required|string',
            'materi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        // Simpan data acara ke database
        $acara = new Acara();
        $acara->nama = $request->nama;
        $acara->tempat = $request->tempat;
        $acara->materi = $request->materi;
        $acara->tanggal_mulai = $request->tanggal_mulai;
        $acara->tanggal_akhir = $request->tanggal_akhir;
        $acara->save();

        // Kembalikan respons dalam format JSON
        return response()->json(['success' => true]);
    }

    // Mengupdate data acara berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'tempat' => 'required|string',
            'materi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);

        // Cari data acara berdasarkan ID
        $acara = Acara::find($id);
        if ($acara) {
            // Update data acara
            $acara->nama = $request->nama;
            $acara->tempat = $request->tempat;
            $acara->materi = $request->materi;
            $acara->tanggal_mulai = $request->tanggal_mulai;
            $acara->tanggal_akhir = $request->tanggal_akhir;
            $acara->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    // Menghapus data acara berdasarkan ID
    public function delete($id)
    {
        // Cari data acara berdasarkan ID
        $acara = Acara::find($id);
        if ($acara) {
            // Hapus data acara
            $acara->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}