<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.app',[
            'daftarBeras' => Beras::all()
        ]);
    }
}
