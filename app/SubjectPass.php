<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectPass extends Model
{
	protected $fillable = ['subject_id','hours_count'];
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
}
