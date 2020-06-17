<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class UserData extends Model
{

    protected $fillable = [
        'name',
        'surname',
        'age',
        'location',
        'bio',
        'picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicture()
    {
        return '/storage/' . $this->picture;
    }






}
