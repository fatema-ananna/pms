<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceCase extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inmate_case (){
        return $this->belongsTo(Inmate::class,'inmate','id');
    }
    public function case_station (){
        return $this->belongsTo(case_station::class,'police_station','id');
    }
}
