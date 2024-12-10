<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 
    ];

    /**
     * The songs that belong to the playlist.
     */
    public function songs()
{
    return $this->belongsToMany(Song::class);
}
}
