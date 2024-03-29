<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function police_case (){
        return $this->belongsTo(PoliceCase::class);
    }
    public function ward (){
        return $this->belongsTo(Ward::class);
    }
    public function cell (){
        return $this->belongsTo(cell::class);
    }
    public function getNameAttribute(){
        return $this->first_name ." " . $this->last_name;
    }
   
}
