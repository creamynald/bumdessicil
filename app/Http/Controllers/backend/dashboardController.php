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
        // Query data dari database
        $rekap_penjualan_perbulan = Orders::selectRaw('MONTH(created_at) as bulan, SUM(total_harga) as total')
            ->groupBy('bulan')
            ->orderBy('bulan') // Pastikan data diambil dalam urutan yang benar
            ->get();

        // Daftar nama bulan
        $nama_bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Mengganti nilai bulan numerik dengan nama bulan
        $rekap_penjualan_perbulan = $rekap_penjualan_perbulan->map(function ($item) use ($nama_bulan) {
            $item->bulan = $nama_bulan[$item->bulan];
            return $item;
        });

        // kirim data ke view
        if (auth()->user()->hasRole('admin')) {
            return view('backend.dashboard', []);
        } elseif (auth()->user()->hasRole('customer')) {
            return view('backend.dashboard', []);
        } else {
            return view('backend.dashboard', [
                'rekap_penjualan_perbulan' => $rekap_penjualan_perbulan,
            ]);
        }
    }
}
