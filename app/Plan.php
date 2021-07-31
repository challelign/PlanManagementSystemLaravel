<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //

    protected $fillable = [
        'title', 'startdate', 'enddate',
        'nodate', 'transport_id', 'task', 'user_id','department_name',
        'department_id','cancel','cancel_name_wana'
        ,'cancel_name_smanager'
        ,'cancel_name_manager'
        ,'cancel_name',
        'pre_payment'


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    public function EkidReport(){
        return $this->belongsTo(EkidReport::class);
    }

    public function AbelReport()
    {
        return $this->belongsTo(AbelReport::class);
    }
}
