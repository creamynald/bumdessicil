<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'no_hp',
        'pembayaran',
        'beras_id',
        'user_id',
        'berat',
        'total_harga',
        'bukti_pembayaran',
        'status',
    ];

    public function beras()
    {
        return $this->belongsTo(Beras::class, 'beras_id');
    }
}
