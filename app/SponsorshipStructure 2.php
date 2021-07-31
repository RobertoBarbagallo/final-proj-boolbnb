<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorshipStructure extends Model
{
    protected $table="sponsorship_structure";
    
    protected $fillable = [
        'structure_id','sponsorship_id','end_date'
    ];
}
