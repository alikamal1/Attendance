<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
	protected $fillable = ['subject_id','teacher_id'];

    protected $table = 'subject_teacher';
}
