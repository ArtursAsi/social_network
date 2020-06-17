<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttributes extends Model
{
    protected $fillable = [
        'weight',
        'height',
        'gender'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
