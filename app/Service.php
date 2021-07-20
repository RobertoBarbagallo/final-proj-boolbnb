<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'id', 'name'
     ];

    public function structures(){
        return $this->belongsToMany("App\Structure");
      }
}
