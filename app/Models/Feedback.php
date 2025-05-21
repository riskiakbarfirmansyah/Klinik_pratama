<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi.
     *
     * @var array
     */
    protected $fillable = [
        'rating',
        'dokter_id',
        'comment',
        
    ];

    /**
     * Hubungan ke model User.
     * Aktifkan jika sistem memiliki autentikasi.
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}