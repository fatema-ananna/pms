<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function inmate_case (){
        return $this->belongsTo(Police_Case::class,'case','id');
    }
}
