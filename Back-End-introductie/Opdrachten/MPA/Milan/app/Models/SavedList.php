<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedList extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'saved_list_songs');
    }
}

