<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toolman extends Model
{
    use HasFactory;

    protected $table = 'toolmans';
    protected $fillable = [
        'nama',
        'nomor_hp',
        'jurusan',
        'id_user',
    ];
}
