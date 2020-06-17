<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function userAttributes()
    {
        return $this->hasOne(UserAttributes::class);
    }

    public function userGalleries()
    {
        return $this->hasMany(UserGallery::class);
    }

    public function userPendings()
    {
        return $this->hasMany(UserPending::class);
    }

    public function pendingBy()
    {
        return $this->hasMany(UserPending::class, 'request_to', 'id');
    }

    public function userStatuses()
    {
        return $this->hasMany(UserStatus::class);
    }

    public function statusBy()
    {
        return $this->hasMany(UserStatus::class, 'request_to', 'id');
    }


    public function scopeLocation($query)
    {
        $user = auth()->user();
        return $query->whereHas('userData', function ($query) use ($user) {
            $query->where('location', $user->userData->location);
        });
    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id', '!=', auth()->id());
    }

    public function scopePendings($query)
    {
        $user = auth()->user();
        return $query->whereHas('userPendings', function ($query) use ($user) {
            $query->where('request_to', $user->id)->where('status', UserPending::PENDING);
        });
    }


    public function scopeFriends($query, $id)
    {

        return $query->whereHas('statusBy', function ($query) use ($id) {
            $query->Where('user_id', $id)->where('status', UserStatus::ACCEPTED);
        })->orWhereHas('userStatuses', function ($query) use ($id) {
            $query->Where('request_to', $id)->where('status', UserStatus::ACCEPTED);
        });
    }

    public function scopeWithoutAcceptedUsers($query)
    {
        $user = auth()->user();
        return $query->whereDoesntHave('statusBy', function ($query) use ($user) {
            $query->Where('user_id', $user->id)->where('status', UserStatus::ACCEPTED);
        })->whereDoesntHave('userStatuses', function ($query) use ($user) {
            $query->where('request_to', $user->id)->where('status', UserStatus::ACCEPTED);
        });
    }

    public function scopeWithoutPending($query)
    {
        $user = auth()->user();
        return $query->whereDoesntHave('pendingBy', function ($query) use ($user) {
            $query->Where('user_id', $user->id)->where('status', UserPending::PENDING);
        })->whereDoesntHave('userPendings', function ($query) use ($user) {
            $query->where('request_to', $user->id)->where('status', UserPending::PENDING);
        });
    }


}
