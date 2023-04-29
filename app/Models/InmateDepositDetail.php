<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmateDepositDetail extends Model
{
    use HasFactory;
    protected $guarded = [

    ];
    public function inmateDeposit()
    {
        return $this->belongsTo(InmateDeposit::class);
    }
}
