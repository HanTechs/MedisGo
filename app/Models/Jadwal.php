<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_user',
        'hari_mulai',
        'hari_selesai',
        'jam_mulai',
        'jam_selesai',
        'kuota_maksimal',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_user', 'id_user');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_jadwal', 'id_jadwal');
    }
}
