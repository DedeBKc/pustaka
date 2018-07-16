<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuUser extends Model
{
    protected $table = 'buku_user';

    protected $fillable = [
        'nim', 'isbn', 'status', 'created_at', 'updated_at',
    ];

}
