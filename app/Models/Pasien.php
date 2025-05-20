<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'rekam_medis';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'rekam_medis',
        'nik',
        'nama_pasien',
        'tgl_lahir',
        'jk',
        'alamat',
        'no_hp',
        'email',
    ];

    /**
     * Get all of the pendaftarans for the Pasien.
     */
    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class, 'rekam_medis', 'id');
    }
}
// json untuk crud pasien
// {
//     "rekam_medis": "1234567890",
//     "nik": "1234567890123456",
//     "nama_pasien": "John Doe",
//     "tgl_lahir": "1990-01-01",
//     "jk": "L",
//     "alamat": "Jl. Contoh No. 1",
//     "no_hp": "081234567890",
//     "email": "
// }

// json edit pasien
// 
// {
//     nama_pasien": "John Cau"
// }
