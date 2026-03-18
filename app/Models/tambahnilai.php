<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Database\Eloquent\Model;

class tambahnilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    public $timestamps = false;

    protected $fillable = [
        'id_nilai',
        'id_siswa',
        'id_ampu',
        'semester',
        'nilai_tugas',
        'nilai_uts',
        'nilai_akhir',
    ];

    public function siswa()
{
    return $this->belongsTo(tambahsiswa::class, 'id_siswa', 'id_siswa');
}

public function ampu()
{
    return $this->belongsTo(tambahmapeldiampu::class, 'id_ampu', 'id_ampu');
}
}