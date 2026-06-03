<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'id_rekam';

    protected $fillable = [
        'id_pendaftaran',
        'tgl_periksa',
        'hasil_pemeriksaan',
        'diagnosa',
        'tindakan',
        'file_resep',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
