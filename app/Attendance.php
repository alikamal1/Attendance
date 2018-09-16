<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = ['student_id','subject_id','allow','status','date','subject_teacher_id'];
    
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

}
