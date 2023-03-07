<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceCase extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inmate (){
        return $this->belongsTo(Inmate::class,'inmate','id');
    }
    public function station (){
        return $this->belongsTo(Station::class);
    }

    public function crime (){
        return $this->belongsTo(Crime::class);
    }
}
