<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Buku extends Model
{
    protected $primaryKey = 'isbn';
    public $incrementing = false;

    public function users()
    {
      return $this->belongsToMany('App\User', 'buku_user', 'isbn', 'nim');
    }

    protected $fillable = [
        'isbn','judul','pengarang','penerbit','halaman', 'created_at', 'updated_at', 'stok', 'image'
    ];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

}
