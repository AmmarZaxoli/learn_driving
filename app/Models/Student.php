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
        'status',
        'data_start',
        'time',
        'time2',
        'dayoflearn',
    ];


    public function nationality()
    {
        return $this->belongsTo(nationality::class);
    }

    public function coach()
    {
        return $this->belongsTo(coach::class);
    }
    public function infos()
    {
        return $this->hasMany(StudentInfo::class);
    }
}
