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
            'pemesanan' => Orders::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
