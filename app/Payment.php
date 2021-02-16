<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'wuloabel', 'transport', 'metebabekiya','nafta_oil','other','payment_id',
        'plan_id', 'approved_by', 'metebabekiya','user_id','total','voucher_no','pdate','approved_by_image'
    ];

    public function plan(){
        return $this->hasMany(Plan::class);
    }
    public function EkidReport(){
        return $this->belongsTo(EkidReport::class);
    }
}
