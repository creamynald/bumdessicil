<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('super admin')) {
            return view('backend.toko.pemesanan.index', [
                'pemesanan' => Orders::latest()->get(),
                'total_pendapatan' => Orders::sum('total_harga'),
            ]);
        } else {
            return view('backend.toko.pemesanan.index', [
                'pemesanan' => Orders::where('toko_id', auth()->user()->id)
                    ->latest()
                    ->get(),
                'total_pendapatan' => Orders::where('toko_id', auth()->user()->id)->sum('total_harga'),
            ]);
        }
    }

    public function show($id)
    {
        return view('backend.toko.pemesanan.detail', [
            'lihat_pesanan' => Orders::find($id),
        ]);
    }

    public function exportPdf(Request $request, $bulan = null, $tahun = null)
    {
        if (auth()->user()->role == 'admin') {
            $query = Orders::query();
        } else {
            $query = Orders::where('toko_id', auth()->user()->id);
        }

        if ($tahun && $bulan) {
            $startDate = "$tahun-$bulan-01";
            $endDate = date('Y-m-t', strtotime($startDate));
            $query->whereBetween('created_at', [$startDate, $endDate]);
        } else {
            // Jika tidak ada filter bulan dan tahun, ambil data terbaru
            $query->latest()->limit(1);
        }

        $pemesanan = $query->get();
        $total_pendapatan = $pemesanan->sum('total_harga');

        $pdf = FacadePdf::loadView('backend.toko.pemesanan.pdf', compact('pemesanan', 'total_pendapatan'));

        return $pdf->download('pemesanan.pdf');
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

    public function cancel($id)
    {
        $order = Orders::findOrFail($id);
        $order->status = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Order has been cancelled.');
    }
}
