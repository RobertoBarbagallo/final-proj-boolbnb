<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'id', 'duration', 'price'
     ];

    public function structures(){
        return $this->belongsToMany("App\Structure");
      }
}
