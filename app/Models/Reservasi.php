<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pasien',
        'alamat',
        'no_hp',
        'email',
        'jenis_kelamin',
        'tanggal_lahir',
        'poliklinik',
        'dokter',
        'jaminan',
        'tanggal_booking',
        'jam_praktek',
        'jam_kedatangan',
        'keluhan',
    ];
}