<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPendonor extends Model
{
    use HasFactory;

    // protected $fillable = ['no_urut'];
    protected $table = 'jadwalpendonor';

    public function jadwalDonor()
    {
        return $this->belongsTo(JadwalDonor::class, 'id_jadwal_donor');
    }

    public function pendonor(){
        return $this->belongsTo(Pendonor::class, 'id_pendonor','id_pendonor');
    }
}
