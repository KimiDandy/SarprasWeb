<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nisn',
        'nama',
        'kelas',
        'nomor_hp',
        'jurusan',
        'id_user',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'id_user', 'id_user');
    }
}
