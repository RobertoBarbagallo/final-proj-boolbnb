<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'id' ,'structure_id', 'ip', 'datetime'
    ];

    public function structure(){
        return $this->belongsTo("App\Structure");
      }
}
