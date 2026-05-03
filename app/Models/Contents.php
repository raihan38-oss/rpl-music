<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'genre_id',
        'media_title',
        'media_file',
        'description',
        'credits',
        'cover_pic'
    ];

    function genre(){
       return $this->belongsTo(Genres::class, 'genre_id');
    }
}
