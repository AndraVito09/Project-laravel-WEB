<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahsiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    public $timestamps = false;

    protected $fillable = [
        'nisn',
        'nama',
        'jk',
        'tanggal_lahir',
        'foto',
        'id_siswa',
        'id_kelas',
        'alamat',
        'no_hp'
    ];
    public function kelas()
    {
        return $this->belongsTo(tambahkelas::class, 'id_kelas', 'id_kelas');
    }
}