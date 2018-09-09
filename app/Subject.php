<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function class()
    {
    	return $this->hasOne('App\Class');
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
