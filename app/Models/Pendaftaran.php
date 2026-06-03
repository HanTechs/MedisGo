<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'id_user',
        'id_jadwal',
        'tgl_pendaftaran',
        'no_antrean',
        'keluhan',
        'status_periksa',
        'status_pembayaran',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_user', 'id_user');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id_jadwal');
    }

    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
