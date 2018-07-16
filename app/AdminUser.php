<?php

namespace App;
use App\Notifications\UserAdminResetPasswordNotification;

class AdminUser extends User
{
    protected $table = "admin_users";
    protected $primaryKey ='id';

    protected $fillable = [
        'name', 'email', 'image', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
