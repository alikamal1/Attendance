<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    public function class()
    {
    	return $this->hasOne('App\Class');
    }

    public function Special_Cases()
    {
    	return $this->hasMany('App\Special_Case');
    }

    public function attendances()
    {
    	return $this->hasMany('App\Attendance');
    }
}
