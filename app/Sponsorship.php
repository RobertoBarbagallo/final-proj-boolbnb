<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public function structures(){
        return $this->belongsToMany("App\Structure");
      }
}
