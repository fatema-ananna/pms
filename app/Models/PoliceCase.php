<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceCase extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inmate (){
        return $this->belongsTo(Inmate::class);
    }
    public function station (){
        return $this->belongsTo(Station::class);
    }

    public function crime (){
        return $this->belongsTo(Crime::class);
    }
    public function punishment(){
        return $this->belongsTo(Punishment::class);
    }
    public function activity (){
        return$this->belongsTo(Activity::class);
    }
}
