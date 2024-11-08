<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syaikhuna extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];
}
