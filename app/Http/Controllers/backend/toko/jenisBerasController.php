<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\jenisBeras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class jenisBerasController extends Controller
{
    public function index()
    {
        return view('backend.toko.jenisBeras.index', [
            'jenisBeras' => jenisBeras::orderBy('urutan', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required',
            'urutan' => 'required|numeric',
        ]);

        // Mencoba menyimpan data
        try {
            // Cek apakah ada nama dan urutan yang sama
            $existingJenisBeras = jenisBeras::where('nama', $validatedData['nama'])
                ->orWhere('urutan', $validatedData['urutan'])
                ->first();

            if ($existingJenisBeras) {
                // Redirect kembali dengan pesan error
                return redirect()->back()->with('error', 'Nama atau urutan sudah digunakan');
            }

            // Buat jenis beras baru
            jenisBeras::create([
                'nama' => $validatedData['nama'],
                'urutan' => $validatedData['urutan'],
            ]);

            // Redirect kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            // Tangani kesalahan dengan memberikan pesan umum
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }
}
