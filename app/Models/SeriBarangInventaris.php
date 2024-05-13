<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriBarangInventaris extends Model
{
    use HasFactory;

    protected $table = 'seribaranginventaris';
    protected $fillable = [
        'nomor_seri',
        'merk',
        'id_barang',
    ];
}
