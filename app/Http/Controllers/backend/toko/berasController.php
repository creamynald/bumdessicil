<?php

namespace App\Http\Controllers\backend\toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class berasController extends Controller
{
    public function index()
    {
        return view('backend.toko.beras.index');
    }
}
