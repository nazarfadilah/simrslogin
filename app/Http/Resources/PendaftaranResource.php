<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'no_registrasi' => $this->no_registrasi,
            'rekam_medis' => $this->rekam_medis,
            'id_poli' => $this->id_poli,
            'tanggal_kunjungan' => $this->tgl_kunjungan,
            'status' => $this->status,
            'no_antrian' => $this->no_antrian,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
