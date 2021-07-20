<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function structures(){
        return $this->belongsToMany("App\Structure");
      }
}
