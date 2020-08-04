<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    public function camppost(){
        return $this->hasMany(Camppost::class);
    }
}
