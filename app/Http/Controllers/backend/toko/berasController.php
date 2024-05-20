<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use App\Models\jenisBeras;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class berasController extends Controller
{
    public function index()
    {
        return view('backend.toko.beras.index', [
            'jenisBeras' => jenisBeras::orderBy('urutan', 'asc')->get(),
            'jumlahBerasYangDimiliki' => Beras::where('user_id', auth()->user()->id)->count(),
            // daftar beras yang diurutkan berdasarkan tanggal pembuatan terbaru serta data beras berdasaarkan masing masing akun
            'daftarBeras' => Beras::orderBy('created_at', 'desc')
                ->where('user_id', auth()->user()->id)
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_beras_id' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotoBeras', 'public');
        }

        Beras::create([
            'jenis_beras_id' => $request->jenis_beras_id,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'user_id' => auth()->user()->id,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('beras.index');
    }
}
