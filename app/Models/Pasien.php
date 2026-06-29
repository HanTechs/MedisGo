<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_user';
    public $incrementing = false;

    protected $fillable = [
        'id_user',
        'nik',
        'no_hp',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_user', 'id_user');
    }
}
