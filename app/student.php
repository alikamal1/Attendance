<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function SpecialCases()
    {
        return $this->hasMany('App\SpecialCase');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
