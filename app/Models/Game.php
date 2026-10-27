<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'genre_id', 'status_id', 'user_id'];

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

        public function gameStatus() {
        return $this->belongsTo(GameStatus::class, 'status_id');
    }
}
