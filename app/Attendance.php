<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function student()
    {
    	return $this->belongsTo('App\Student');
    }

    public function class()
    {
    	return $this->belongsTo('App\Class');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
}
