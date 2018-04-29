<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    public function user(){


    	return $this->belongsTo(User::class);
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
}
