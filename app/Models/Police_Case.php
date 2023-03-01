<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police_Case extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inmate_case (){
        return $this->belongsTo(Inmate::class,'inmate','id');
    }
}
