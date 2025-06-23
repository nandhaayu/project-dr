<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
     protected $fillable = [
        'nama', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'no_hp', 'jenis_kelamin', 'nama_orangtua', 'kurikulum',
        'alamat', 'harapan', 'akte', 'kk', 'status'
    ];

    public function santri()
    {
        return $this->hasOne(Santri::class);
    }
}
