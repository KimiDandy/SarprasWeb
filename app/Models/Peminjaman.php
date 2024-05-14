<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_perizinan',
        'status_peminjaman',
        'id_user',
    ];
}
