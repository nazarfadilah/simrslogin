<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('pendaftaran.pendaftaran', compact('pendaftarans'));
    }

    public function riwayat()
    {
        $riwayatPendaftaran = Pendaftaran::all();
        return view('pendaftaran.riwayat_pendaftaran', compact('riwayatPendaftaran'));
    }
    public function create()
    {
        return view('pendaftaran.tambah_pendaftaran');
    }
}
