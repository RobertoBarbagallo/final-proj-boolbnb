<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function structure(){
        return $this->belongsTo("App\Structure");
      }
}
