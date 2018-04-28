<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    public function user(){


    	return $this->belongsTo(User::class);
    }
    
    public function answer(){


    	return $this->belongsTo(answer::class);
    }
}
