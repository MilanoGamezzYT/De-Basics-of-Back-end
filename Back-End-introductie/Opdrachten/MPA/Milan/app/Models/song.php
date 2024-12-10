<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // Massale toewijzing van velden
    protected $fillable = ['name', 'artist', 'duration', 'genre_id'];

    /**
     * Relatie met Playlist (many-to-many)
     */
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song');
    }

    /**
     * Relatie met Genre (belongs to)
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
