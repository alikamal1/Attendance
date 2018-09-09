<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function Student()
    {
    	return $this->belongsTo('App\Student');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function attendances()
    {
    	return $this->hasMany('App\Attendance');
    }
}
