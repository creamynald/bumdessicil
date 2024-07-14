<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index()
    {
        return view('backend.toko.pemesanan.index',[
            'pemesanan' => Orders::where('toko_id', auth()->user()->id)->get(),
        ]);
    }

    public function show($id)
    {
        return view('backend.toko.pemesanan.detail', [
            'lihat_pesanan' => Orders::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        Orders::find($id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Status pesanan berhasil diubah');
    }
}
