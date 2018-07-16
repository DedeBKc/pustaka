<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Buku;

class User extends Authenticatable
{
    use Notifiable;

    public function bukus()
    {
      return $this->belongsToMany('App\Buku', 'buku_user', 'nim', 'isbn');
    }

    protected $fillable = [
        'nim', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
