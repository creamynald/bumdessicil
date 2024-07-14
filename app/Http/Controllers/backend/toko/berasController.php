<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use App\Models\jenisBeras;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class berasController extends Controller
{
    public function index()
    {
        return view('backend.toko.beras.index', [
            'jenisBeras' => jenisBeras::orderBy('urutan', 'asc')->get(),
            'jumlahBerasYangDimiliki' => Beras::where('user_id', auth()->user()->id)->count(),
            // daftar beras yang diurutkan berdasarkan tanggal pembuatan terbaru serta data beras berdasaarkan masing masing akun
            'daftarBeras' => Beras::orderBy('created_at', 'desc')
                ->where('user_id', auth()->user()->id)
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        // Melakukan validasi
        $validator = Validator::make($request->all(), [
            'jenis_beras_id' => 'required',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_hp' => 'numeric',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data beras gagal ditambahkan');
            return redirect()->route('beras.index');
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $username = Auth::user()->name; // Mengambil nama pengguna yang sedang login
            $username = str_replace(' ', '-', $username); // Mengganti spasi dengan tanda -
            $jenisBeras = $request->input('jenis_beras_id'); // Mengambil jenis beras dari input
            $date = Carbon::now()->format('Ymd'); // Mengambil tanggal sekarang dalam format Ymd

            // Membuat nama file sesuai format [username]-[jenis beras]-[tanggal input].[ext]
            $filename = $username . '-' . $jenisBeras . '-' . $date . '.' . $file->getClientOriginalExtension();
            $fotoPath = 'fotoBeras/' . $filename;
            $file->move(public_path('fotoBeras'), $filename);
        }

        // Menyimpan data ke database
        Beras::create([
            'jenis_beras_id' => $request->jenis_beras_id,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'user_id' => auth()->user()->id,
        ]);

        if($request->no_hp != null) {
            User::where('id', auth()->user()->id)->update([
                'no_hp' => $request->no_hp,
            ]);
        }

        Alert::success('Berhasil', 'Data beras berhasil ditambahkan');
        return redirect()->route('beras.index');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_beras_id' => 'required',
            'harga' => 'required|numeric',
            'berat' => 'required|numeric',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data beras gagal diubah');
            return redirect()->route('beras.index');
        }

        $beras = Beras::findOrFail($id);

        $fotoPath = $beras->foto;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $username = Auth::user()->name;
            $username = str_replace(' ', '-', $username);
            $jenisBeras = $request->input('jenis_beras_id');
            $date = Carbon::now()->format('Ymd');

            $filename = $username . '-' . $jenisBeras . '-' . $date . '.' . $file->getClientOriginalExtension();
            $fotoPath = 'fotoBeras/' . $filename;
            $file->move(public_path('fotoBeras'), $filename);
        }

        $beras->update([
            'jenis_beras_id' => $request->jenis_beras_id,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        Alert::success('Berhasil', 'Data beras berhasil diubah');
        return redirect()->route('beras.index');
    }

    public function destroy($id)
    {
        try {
            $beras = Beras::findOrFail($id);
            $beras->delete();

            return response()->json(['success' => 'Data beras berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data beras'], 500);
        }
    }

    public function show($id)
    {
        $getBeras = Beras::findOrFail($id);
        $getUserLogin = Auth::user();
        return view('backend.toko.beras.show', [
            'getBeras' => $getBeras,
            'getUserLogin' => $getUserLogin,
        ]);
        // return response()->json($beras);
    }
}
