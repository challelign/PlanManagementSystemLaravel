<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbelReport extends Model
{
    protected $fillable = [
        'user_id', 'splace', 'sdate',
        'dkplace',
//        'dkbirr',
        'dmplace',
        'department_name',
//        'dmbirr',
        'deplace',
//        'debirr',
        'workddate',
        'adarplace',
//        'adarbirr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function EkidReport()
    {
        return $this->belongsTo(EkidReport::class);
    }
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
