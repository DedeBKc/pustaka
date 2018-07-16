<?php

namespace App;
use App\Notifications\UserAdminResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Buku;

class Staff extends Authenticatable
{
    protected $table = "staff";
    protected $primaryKey ='id';

    protected $fillable = [
        'name', 'email', 'image', 'password', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
