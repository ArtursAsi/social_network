<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userPending extends Model
{
    public const PENDING = 'pending';

    protected $fillable = ['request_to', 'status'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
