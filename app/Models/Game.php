<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

        public function gameStatus() {
        return $this->belongsTo(GameStatus::class, 'status_id');
    }
}
