<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'id', 'duration', 'price', 'created_at'
    ];
    public function structures(){
        return $this->belongsToMany("App\Structure");
      }
}
