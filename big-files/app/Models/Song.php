<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'audio_file',  // store file path only
    ];

    // Optional: full URL
    public function getAudioUrlAttribute()
    {
        return asset('storage/' . $this->audio_file);
    }
}