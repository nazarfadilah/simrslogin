<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;

    /**
     * Kunci utama untuk model.
     *
     * @var string
     */
    protected $primaryKey = 'no_registrasi';

    /**
     * Menunjukkan apakah ID bersifat auto-increment.
     *
     * @var bool
     */
    public $incrementing = false; // no_registrasi tidak auto-increment, jadi false

    /**
     * Tipe data dari ID auto-increment.
     *
     * @var string
     */
    protected $keyType = 'string'; // primary key no_registrasi bertipe string

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_registrasi', // Ditambahkan karena merupakan primary key dan perlu di-assign.
        'rekam_medis',
        'id_poli',
        'tgl_kunjungan',
        'status',
        'no_antrian',
    ];

    /**
     * Mendapatkan pasien yang memiliki Pendaftaran ini.
     */
    public function pasien(): BelongsTo
    {
        // Kolom 'rekam_medis' pada tabel 'pendaftarans' berelasi dengan kolom 'rekam_medis' pada tabel 'pasiens'.
        return $this->belongsTo(Pasien::class, 'rekam_medis', 'rekam_medis');
    }

    /**
     * Mendapatkan poli yang memiliki Pendaftaran ini.
     */
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}
