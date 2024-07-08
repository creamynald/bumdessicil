<?php

namespace App\Http\Controllers\backend\customer;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use App\Models\jenisBeras;
use App\Models\Orders;
use Illuminate\Http\Request;

class berasController extends Controller
{
    public function cari()
    {
        return view('backend.customer.beras.cari', [
            'daftarBeras' => Beras::get(),
            'jenisBeras' => jenisBeras::get(),
        ]);
    }

    public function lihat($id)
    {
        return view('backend.customer.beras.lihat', [
            'getBeras' => Beras::find($id),
        ]);
    }

    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'berat' => 'required|numeric|min:1',
        ]);

        // Cari objek Beras berdasarkan $id
        $beras = Beras::find($id);
        $beratBeras = Beras::find($id)->berat;

        // Hitung total harga
        $totalHarga = $request->berat * $beratBeras;

        // Buat objek Order baru
        $order = new Orders();
        $order->beras_id = $beras->id;
        $order->user_id = auth()->user()->id;
        $order->alamat = $request->alamat;
        $order->no_hp = $request->no_hp;
        $order->berat = $request->berat;
        $order->total_harga = $totalHarga;

        // Simpan pesanan
        $order->save();

        // pengurangan stok beras
        $beras->berat = $beras->berat - $request->berat;
        $beras->save();

        return to_route('customer.orders')->with('success', 'Pesanan berhasil ditambahkan');
    }
}
