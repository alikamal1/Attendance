<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = ['year','study','stage','branch'];

    public function Students()
    {
        return $this->hasMany('App\Student');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    public function attendances()
    {
        return $this->hasManyThrough('App\Attendance','App\Student');
    }
}
