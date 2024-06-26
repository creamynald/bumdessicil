<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beras extends Model
{
    use HasFactory;

    protected $table = 'beras';

    protected $fillable = [
        'jenis_beras_id',
        'harga',
        'berat',
        'deskripsi',
        'foto',
        'user_id'
    ];

    public function jenisBeras()
    {
        return $this->belongsTo(jenisBeras::class, 'jenis_beras_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
