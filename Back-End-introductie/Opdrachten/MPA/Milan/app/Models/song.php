<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function Playlist(){
        return $this->belongsToMany(Playlist::Class);
    }

    protected $fillable = ['title', 'artist', 'duration', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
