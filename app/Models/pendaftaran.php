<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'address',
        'tanggal_lahir',
        'gender',
        'asal_sekolah',
        'no_hp',
        'nama_ayah',
        'nama_ibu',
        'email'
    ];
}
