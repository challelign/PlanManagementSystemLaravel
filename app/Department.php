<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = [
        'name', 'slug',

    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function plan()
    {
        return $this->hasMany(Plan::class);
    }
    public function EkidReport(){
        return $this->belongsTo(EkidReport::class);
    }
}
