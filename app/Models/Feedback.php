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
        'comment',
        'user_id', // Opsional, jika Anda ingin menghubungkan dengan user
    ];

    /**
     * Hubungan ke model User.
     * Aktifkan jika sistem memiliki autentikasi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}