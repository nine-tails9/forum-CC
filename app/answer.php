<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    //
    public function user(){


    	return $this->belongsTo(User::class);
    }
    public function question(){


    	return $this->belongsTo(question::class);
    }

    public function comments(){

        return $this->hasMany(comment::class);
    }
}
