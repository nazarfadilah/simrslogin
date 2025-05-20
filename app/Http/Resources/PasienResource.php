<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PasienResource extends JsonResource
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
            'rekam_medis' => $this->rekam_medis,
            'nik' => $this->nik,
            'nama_pasien' => $this->nama_pasien,
            'tanggal_lahir' => $this->tgl_lahir,
            'jenis_kelamin' => $this->jk,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->no_hp,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
