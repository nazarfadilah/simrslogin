<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DokterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_dokter' => $this->id_dokter,
            'nama_dokter' => $this->nama_dokter,
            'spesialisasi' => $this->spesialisasi,
            'nomor_telepon' => $this->no_hp_dokter,
            'email' => $this->email_dokter,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
