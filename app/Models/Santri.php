<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $fillable = [
        'pendaftar_id', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir',
        'no_hp', 'jenis_kelamin', 'nama_orangtua', 'kurikulum', 'harapan',
        'alamat', 'harapan', 'akte', 'kk', 'tanggal_masuk'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
