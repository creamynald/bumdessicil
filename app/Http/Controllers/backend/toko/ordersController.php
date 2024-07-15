<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\View;

class ordersController extends Controller
{
    public function index()
    {
        return view('backend.toko.pemesanan.index', [
            'pemesanan' => Orders::where('toko_id', auth()->user()->id)
                ->latest()
                ->get(),
            'total_pendapatan' => Orders::where('toko_id', auth()->user()->id)->sum('total_harga'),
        ]);
    }

    public function show($id)
    {
        return view('backend.toko.pemesanan.detail', [
            'lihat_pesanan' => Orders::find($id),
        ]);
    }

    public function exportPdf()
    {
        $pemesanan = Orders::all();
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
        // Find the order by its ID
        $order = Orders::findOrFail($id);

        // Perform the cancellation logic, e.g., updating the order status
        $order->status = 'cancelled'; // Assuming you have a status field
        $order->save();

        // Optionally, you can add flash messages or other response handling here
        return redirect()->back()->with('success', 'Order has been cancelled.');
    }
}
