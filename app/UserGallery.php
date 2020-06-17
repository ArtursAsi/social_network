<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    public $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicture(){
        return '/storage/'.$this->name;
    }
}
