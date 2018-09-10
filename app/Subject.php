<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    public function subject_pass()
    {
        return $this->hasOne('App\SubjectPass');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Subject','subject_teacher');
    }
}
