<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Database\Eloquent\Model;

class tambahmapeldiampu extends Model
{
    use HasFactory;

    protected $table = 'mapel_diampu';
    protected $primaryKey = 'id_ampu';
    public $timestamps = false;

    protected $fillable = [
        'id_ampu',
        'id_guru',
        'id_mapel',
        'id_kelas'
    ];

    public function guru()
    {
        return $this->belongsTo(tambahguru::class, 'id_guru', 'id_guru');
    }

    public function mapel()
    {
        return $this->belongsTo(tambahmapel::class, 'id_mapel', 'id_mapel');
    }

    public function kelas()
    {
        return $this->belongsTo(tambahkelas::class, 'id_kelas', 'id_kelas');
    }
    
}