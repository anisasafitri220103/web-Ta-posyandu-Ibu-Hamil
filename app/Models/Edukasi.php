<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    use HasFactory;
     protected $fillable = [
        'id_kategori',
        'deskripsi',
        'nama_edukasi',
        'gambar'
    ];
}