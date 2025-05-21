<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // Tampilkan semua data dokter
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.dokter', compact('dokters'));
    }
}
