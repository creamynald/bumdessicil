<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
            'no_rekening' => ['required_if:role,bumdes', 'nullable', 'numeric'],
            'nama_bank' => ['required_if:role,bumdes', 'nullable', 'string'],
            'dokumen' => ['required_if:role,bumdes', 'nullable', 'file', 'mimes:pdf,doc,docx'],
        ]);
    }

    protected function create(array $data)
    {
        // Create the user with the provided data
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'no_rekening' => $data['no_rekening'] ?? null,
            'nama_bank' => $data['nama_bank'] ?? null,
            'is_active' => false, // Set default value for is_active
        ]);

        // Handle file upload if present
        if (isset($data['dokumen']) && $data['dokumen'] instanceof \Illuminate\Http\UploadedFile) {
            $buktiPembayaran = $data['dokumen'];
            $username = $user->name; // Mengambil nama pengguna yang baru dibuat
            $username = str_replace(' ', '-', $username); // Mengganti spasi dengan tanda -
            $jenisBeras = $data['role']; // Menggunakan role sebagai pengganti jenis beras
            $date = Carbon::now()->format('Ymd'); // Mengambil tanggal sekarang dalam format Ymd

            // Membuat nama file sesuai format [username]-[jenis beras]-[tanggal input].[ext]
            $filename = $username . '-' . $jenisBeras . '-' . $date . '.' . $buktiPembayaran->getClientOriginalExtension();
            $buktiPembayaranPath = 'bukti_pembayaran/' . $filename;

            // Menyimpan file ke direktori publik
            $buktiPembayaran->move(public_path('bukti_pembayaran'), $filename);

            // Update path file di user
            $user->dokumen = $buktiPembayaranPath;
            $user->save();
        }

        // Assign role from the dropdown
        $roleName = $data['role']; // make sure 'role' is the name of the dropdown

        // Check if the role exists and assign it to the user
        if ($role = Role::findByName($roleName)) {
            $user->assignRole($role);
        } else {
            // Optionally handle the case where the selected role does not exist
        }

        return $user;
    }
}
