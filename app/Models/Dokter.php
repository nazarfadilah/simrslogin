<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_dokter';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_dokter',
        'id_user',
        'nama_dokter',
        'spesialisasi',
        'no_hp_dokter',
        'email_dokter',
    ];

    /**
     * Get all of the polis for the Dokter.
     */
    public function polis(): HasMany
    {
        return $this->hasMany(Poli::class, 'id_dokter', 'id_dokter');

    }
}

// json untuk crud dokter
// {
//     "id_dokter": 1,
//     "id_user": 5,
//     "nama_dokter": "dr. John Doe",
//     "spesialisasi": "Umum",
//     "no_hp_dokter": "081234567890",
//     "email_dokter": "
// }