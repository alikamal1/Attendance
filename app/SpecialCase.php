<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialCase extends Model
{
	protected $fillable = ['subject_id','student_id','case_type'];

    public function student()
    {
    	return $this->belongsTo('App\Student');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
}
