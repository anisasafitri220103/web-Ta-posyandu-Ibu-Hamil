<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori1 extends Model
{
      protected $fillable = [
        'id',
        'nama_kategori',
        'icon'
    ];
}