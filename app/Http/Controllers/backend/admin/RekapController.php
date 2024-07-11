<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Add this line to import the User model

class RekapController extends Controller
{
    public function index()
    {
        // get user where role is bumdes from spatie

        if (request()->segment(2) == 'list-bumdes') {
            // Move the if statement outside of the array
            return view('backend.admin.users.index', [
                'users' => User::role('bumdes')->get(),
                'route' => route('list-bumdes.index'),
                'url' => 'list-bumdes',
            ]);
        } else {
            return view('backend.admin.users.index', [
                'users' => User::role('customer')->get(),
                'route' => route('list-customer.index'),
                'url' => 'list-customer',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        validator([
            'name' => 'min:3|max:50',
            'email' => 'required|email',
        ]);

        $user->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => 'required',
        ]);

        $user = User::create($validated);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id); // Use findOrFail to throw an exception if the user is not found
            $user->removeRole($user->roles->first()->name); // Remove role first
            $user->delete(); // Then delete the user

            return response()->json(['success' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data gagal dihapus'], 500);
        }
    }
}
