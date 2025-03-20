<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'judul',
    //     'foto,'
    // ];
    protected $fillable = ['judul', 'foto'];
    protected $casts = [
        'foto' => 'array', // Pastikan foto otomatis didekodekan saat diambil dari database
    ];
}
