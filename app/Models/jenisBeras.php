<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisBeras extends Model
{
    use HasFactory;

    protected $table = 'jenis_beras';
    protected $fillable = ['nama', 'urutan'];

    public function beras()
    {
        return $this->hasMany(Beras::class, 'jenis_beras_id');
    }
}
