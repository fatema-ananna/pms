<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmateDeposit extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='inmate_deposit';

    public function inmate(){
        return $this->belongsTo(Inmate::class,"inmate_id","inmate_id");
    }


}
