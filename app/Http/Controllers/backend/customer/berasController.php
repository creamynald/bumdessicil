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

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'pembayaran' => 'required',
            'berat' => 'required',
            'total_harga' => 'required',
            'status' => 'processing'
        ]);

        Orders::create([
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'pembayaran' => $request->pembayaran,
            'beras_id' => $request->beras_id,
            'user_id' => auth()->user()->id,
            'berat' => $request->berat,
            'total_harga' => $request->total_harga,
            'bukti_pembayaran' => $request->bukti_pembayaran,
            'status' => 'processing'
        ]);

        // return dd
        return redirect()->route('beras.index')
            ->with('success', 'Beras created successfully.');

        // Orders::create($request->all());

        // return redirect()->route('beras.index')
        //     ->with('success', 'Beras created successfully.');
    }
}
