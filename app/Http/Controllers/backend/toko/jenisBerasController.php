<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\jenisBeras;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class jenisBerasController extends Controller
{
    public function index()
    {
        return view('backend.toko.jenisBeras.index', [
            'jenisBeras' => jenisBeras::orderBy('urutan', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'urutan' => 'required|numeric',
        ]);

        try {
            $existingJenisBeras = jenisBeras::where('nama', $validatedData['nama'])
                ->orWhere('urutan', $validatedData['urutan'])
                ->first();

            if ($existingJenisBeras) {
                Alert::error('Error', 'Data sudah ada');
                return redirect()->back();
            }

            jenisBeras::create([
                'nama' => $validatedData['nama'],
                'urutan' => $validatedData['urutan'],
            ]);

            Alert::success('Success', 'Data berhasil disimpan');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'urutan' => 'required|integer',
        ]);

        $jenisBeras = JenisBeras::findOrFail($id);
        $jenisBeras->update([
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        Alert::success('Success', 'Data updated successfully');
        return redirect()->route('jenis-beras.index');
    }

    public function destroy($id)
    {
        try {
            $jenisBeras = jenisBeras::findOrFail($id);
            $jenisBeras->delete();

            return response()->json(['success' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
