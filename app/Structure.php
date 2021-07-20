<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{

    protected $fillable = [
       'id', 'user_id', 'name', 'lat', 'long', 'rooms', 'beds', 'bathrooms', 'sqm', 'visible', 'slug', 'cover_img_path'
    ];

    public function user() {
        return $this->belongsTo("App\User");
      }

      public function services(){
        return $this->belongsToMany("App\Service");
      }      

      public function sponsorships(){
        return $this->belongsToMany("App\Sponsorship");
      }    
      
      public function messages() {
        return $this->hasMany("App\Message");
    }

    public function visits() {
        return $this->hasMany("App\Visit");
    }

    public function images() {
        return $this->hasMany("App\Image");
    }
}
