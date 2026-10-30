<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false; 

    protected $fillable = [
        'username',
        'password_hash',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    public function username()
    {
        return 'username';
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function games() {
        return $this->hasMany(Game::class, 'user_id');
    }
}
