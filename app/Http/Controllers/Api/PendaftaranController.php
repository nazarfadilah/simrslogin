<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PendaftaranResource;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return PendaftaranResource::collection($pendaftarans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendaftaran = Pendaftaran::create($request->all());
        return new PendaftaranResource($pendaftaran);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return new PendaftaranResource($pendaftaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $pendaftaran->update($request->all());
        return new PendaftaranResource($pendaftaran);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return response()->json(['message' => 'Data pendaftaran berhasil dihapus']);
    }
}
