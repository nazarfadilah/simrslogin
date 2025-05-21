<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\Pasien;

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
    $polis = Poli::all();
    $dokters = Dokter::all();

    return view('pendaftaran.tambah_pendaftaran', compact('polis', 'dokters'));
}
}
