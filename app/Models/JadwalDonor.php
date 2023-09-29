<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDonor extends Model
{
    use HasFactory;

    protected $table = 'jadwaldonor';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function jadwalPendonor()
    {
        return $this->hasMany(JadwalPendonor::class, 'id');
    }
}
