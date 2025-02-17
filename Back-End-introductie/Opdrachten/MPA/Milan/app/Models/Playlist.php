<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'user_id' 
    ];

    /**
     * The songs that belong to the playlist.
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}   
