<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    use HasFactory;

    protected $table = 'golongandarah';
    protected $primaryKey = 'id_stok';
    protected $guarded = [];

    public function pendonor()
    {
        return $this->hasMany(Pendonor::class, 'id_golongan_darah', 'id_goldar');
    }

    public function stokDarah()
    {
        return $this->hasMany(StokDarah::class, 'gol_darah', 'id_goldar');
    }
}


