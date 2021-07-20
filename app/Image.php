<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function structure(){
        return $this->belongsTo("App\Structure");
      }
}
