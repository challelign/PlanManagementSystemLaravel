<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    //

    public function plan(){
        return $this->hasMany(Plan::class);
    }
    public function EkidReport()
    {
        return $this->belongsTo(EkidReport::class);
    }
    public function AbelReport()
    {
        return $this->belongsTo(AbelReport::class);
    }
}
