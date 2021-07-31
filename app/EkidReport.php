<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EkidReport extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_id',
        'title',
        'nodate',
        'department_name',
        'ekid_on_list',
        'ekid_on_list_done',
        'ekid_ont_on_list_done',
        'not_done_reason',
        'transport_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }


    public function AbelReport()
    {
        return $this->belongsTo(AbelReport::class);
    }
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
