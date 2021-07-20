<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id', 'structure_id', 'sender_email', 'content'
     ];
    public function structure(){
        return $this->belongsTo("App\Structure");
      }
}
