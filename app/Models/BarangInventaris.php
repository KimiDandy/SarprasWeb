<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangInventaris extends Model
{
    use HasFactory;

    protected $table = 'baranginventaris';

    protected $fillable = [
        'nama_barang',
        'gambar_barang',
    ];
}
