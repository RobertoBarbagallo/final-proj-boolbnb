<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id', 'structure_id', 'path'
     ];

    public function structure(){
        return $this->belongsTo("App\Structure");
      }
}
