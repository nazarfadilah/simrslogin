<?php

namespace App\Http\Controllers;
use App\Models\Pasien;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    
    public function index()
    {
        $pasien = Pasien::all();
        return view('pasien.pasien', compact('pasien'));
    }
    public function tambah()
    {
        return view('pasien.tambah_pasien');
    }
    public function edit()
    {
        return view ('pasien.edit_pasien');
    }
}
