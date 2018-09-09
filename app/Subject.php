<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function level()
    {
    	return $this->hasOne('App\Level');
    }

    public function attendances()
    {
    	return $this->hasMany('App\Attendance');
    }

    public function subject_pass()
    {
    	return $this->hasOne('App\Subject_Pass');
    }

    public function teachers()
    {
    	return $this->belongsToMany('App\Subject');
    }
}
