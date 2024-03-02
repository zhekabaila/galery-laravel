<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'lokasi_file',
        'user_id',
        'album_id',
    ];

    protected $table = 'foto';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
