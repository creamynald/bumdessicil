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
        $validatedData = $request->validate(
            [
                'alamat' => 'required',
                'no_hp' => 'required',
                'berat' => 'required|numeric|min:1',
                'pembayaran' => 'required|in:cod,transfer',
                'bukti_pembayaran' => 'required_if:pembayaran,transfer|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'pembayaran.required' => 'Metode pembayaran harus dipilih',
                'bukti_pembayaran.required_if' => 'Bukti pembayaran harus diupload jika metode pembayaran adalah transfer',
            ]
        );

        $buktiPembayaranPath = null;

        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPembayaran = $request->file('bukti_pembayaran');
            $namaBuktiPembayaran = time() . '.' . $buktiPembayaran->getClientOriginalExtension();
            $buktiPembayaran->move(public_path('bukti_pembayaran'), $namaBuktiPembayaran);
            $buktiPembayaranPath = 'bukti_pembayaran/' . $namaBuktiPembayaran;
        }

        $beras = Beras::findOrFail($id);
        $hargaBeras = $beras->harga;

        $totalHarga = $request->berat * $hargaBeras;

        $toko_id = $beras->user_id;

        $order = new Orders();
        $order->beras_id = $beras->id;
        $order->user_id = auth()->user()->id;
        $order->alamat = $request->alamat;
        $order->toko_id = $toko_id;
        $order->no_hp = $request->no_hp;
        $order->berat = $request->berat;
        $order->total_harga = $totalHarga;
        $order->pembayaran = $request->pembayaran; // Ensure the payment type is saved

        if ($buktiPembayaranPath) {
            $order->bukti_pembayaran = $buktiPembayaranPath;
        }

        $order->save();

        $beras->berat -= $request->berat;
        $beras->save();

        return to_route('customer.orders')->with('success', 'Pesanan berhasil ditambahkan');
    }
}
