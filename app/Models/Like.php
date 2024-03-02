<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_id',
        'user_id',
        'tanggal'
    ];

    protected $table = 'like';

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }

    public function onLike($foto_id)
    {
        $alreadyLike = Like::where('user_id', 1)->where('foto_id', $foto_id);

        if ($alreadyLike->exists()) {
            $alreadyLike->first()->delete();
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'foto_id' => $foto_id,
                'tanggal' => now()->format('Y-m-d'),
            ]);
        }
    }
}
