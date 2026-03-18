<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use illuminate\Database\Eloquent\Model;

class tambahberita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $timestamps = false;

    protected $fillable = [
        'id_berita',
        'judul',
        'isi',
        'tanggal_post',
        'id_guru',
    ];

    public function guru()
    {
        return $this->belongsTo(tambahguru::class, 'id_guru', 'id_guru');
    }
}