<?php

namespace App\Http\Controllers\backend\customer;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        return view('backend.customer.pesanan.index',[
            'pesanan' => Orders::where('user_id', auth()->user()->id)->get(),
            'total_pembelian' => Orders::where('user_id', auth()->user()->id)->sum('total_harga'),
        ]);
    }

    public function detail($id)
    {
        return view('backend.customer.pesanan.detail',[
            'pesanan' => Orders::findOrFail($id),
        ]);
    }
}
