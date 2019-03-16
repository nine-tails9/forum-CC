<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function questions(){

        return $this->hasMany(question::class);
    }

    public function answers(){

        return $this->hasMany(answer::class);
    }

    public function comment(){

        return $this->hasMany(comment::class);
    }
    public function Voted(){

        return $this->hasMany(Voted::class);
    }

    public function pendingAns(){

        return $this->hasMany(pendingAns::class);
    }

    public function message(){

        return $this->hasMany(message::class);
    }


}
