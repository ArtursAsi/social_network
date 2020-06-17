<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    public const ACCEPTED = 'accepted';
    public const DECLINED = 'declined';
    protected $fillable = ['request_to', 'status'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
