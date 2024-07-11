<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Add this line to import the User model

class ListBumdesController extends Controller
{
    public function index()
    {
        // get user where role is bumdes from spatie
        
        if (request()->segment(2) == 'list-bumdes') { // Move the if statement outside of the array
            return view('backend.admin.users.index',[
                'users' => User::role('bumdes')->get(),
                'route' => route('list-bumdes.index'),
                'route_store' => route('list-bumdes.store'),
                'url' => 'list-bumdes'
            ]);
        } else {
            return view('backend.admin.users.index',[
                'users' => User::role('customer')->get(),
                'route' => route('list-customer.index'),
                'route_store' => route('list-customer.store'),
                'url' => 'list-customer'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $validated = $request->validate([
            'name' => 'min:3|max:50',
            'email' => 'email',
        ]);
        
        $user->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'role' => 'required'
        ]);

        $user = User::create($validated);
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->removeRole($user->roles->first()->name);

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
