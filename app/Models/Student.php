<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'mother_name',
        'birthday',
        'location',
        'mobile_number',
        'date_join',
        'date_dr_number',
        'invoice',
        'nationality_id',
        'coach_id',
        'number_car',
        'typecar',
        'learn',
        'data_start',
        'time',
    ];


    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
