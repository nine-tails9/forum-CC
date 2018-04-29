<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    //
    public function question(){

        return $this->hasMany(question::class);
    }
}
