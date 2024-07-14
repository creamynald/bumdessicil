<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use App\Models\Orders;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('backend.dashboard', [
                'title' => 'Dashboard Admin',
                'jumlah_penjualan' => '',
                'jumlah_pendapatan' => '',
                'jumlah_produk' => '',
                'jumlah_chat' => '',
            ]);
        } elseif (auth()->user()->hasRole('customer')) {
            return view('backend.dashboard', [
                'title' => 'Dashboard Customer',
                'jumlah_penjualan' => '',
                'jumlah_pendapatan' => '',
                'jumlah_produk' => '',
                'jumlah_chat' => '',
            ]);
        } else {
            return view('backend.dashboard', [
                'title' => 'Dashboard Bumdes/Toko',
                'jumlah_penjualan' => Orders::where('toko_id', auth()->user()->id)->count(),
                'jumlah_pendapatan' => Orders::where('toko_id', auth()->user()->id)->sum('total_harga'),
                'jumlah_produk' => Beras::where('user_id', auth()->user()->id)->count(),
                'jumlah_chat' => '',
            ]);
        }
    }
}
