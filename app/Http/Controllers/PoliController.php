<?php

namespace App\Http\Controllers;
use App\Models\Poli;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::all();
        return view('poli.poli', compact('polis'));
    }
}   
