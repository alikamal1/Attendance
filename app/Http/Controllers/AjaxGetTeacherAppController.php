<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Setting;
use App\Subject;
use App\Attendance;
use App\Teacher;

class AjaxGetTeacherAppController extends Controller
{
	public function getyear()
    {
    	$year = Setting::where('name','سنة')->orderByDesc('created_at')->get();
    	return response()->json(array('data'=> $year), 200);
    }

    public function getstudy($year)
    {
    	$study = Level::where('year',$year)->get()->unique('study');
    	return response()->json(array('data'=> $study), 200);
    }

    public function getstage($year,$study)
    {
    	$stage = Level::where('year',$year)->where('study',$study)->get()->unique('stage');
    	return response()->json(array('data'=> $stage), 200);
    }

    public function getbranch($year,$study,$stage)
    {
    	$branch = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->get()->unique('branch');
    	return response()->json(array('data'=> $branch), 200);
    }

    public function getsubject($year,$study,$stage,$branch,$teacher)
    {

        $level_id = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->where('branch',$branch)->first();

        $sujectTeacher = Teacher::where('username',$teacher)->first()->subjects()->where('level_id',$level_id->id)->get()->toarray();

    	return response()->json(array('data'=> $sujectTeacher), 200);
    }

    public function getattendancelist($subject_id)
    {
        $level = Subject::find($subject_id)->level()->first();
        $subject = Subject::find($subject_id)->name;
        $dates = Attendance::where('subject_id',$subject_id)->get()->unique('date')->toarray();
        return response()->json(array('data'=> $dates,'level' => $level,'subject' => $subject), 200);
    }

    public function getlevelid($year,$study,$stage,$branch)
    {
        $level_id = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->where('branch',$branch)->first()->id;
        return response()->json(array('level_id'=> $level_id), 200);
    }

    public function getstudents($year,$study,$stage,$branch)
    {
        $students = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->where('branch',$branch)->first()->students()->get();
        return response()->json(array('students'=> $students), 200);
    }

    public function getteachers()
    {
        $teachers = Teacher::get(['id','username']);
        return response()->json(array('teachers' => $teachers), 200);
    }

    public function getratio()
    {
        $ratio = Setting::where('name','انذرات')->orderBy('created_at')->get();
    	return response()->json(array('data'=> $ratio), 200);
    }
    
    public function is_duplicated($subject_selected,$year,$month, $day,$years,$study,$stage,$branch)
    {
        $date = $year .'-'. $month .'-'. $day;
        $level_id = Level::where('year',$years)->where('study',$study)->where('stage',$stage)->where('branch',$branch)->first()->id;
		$subject_selected_id = Level::find($level_id)->subjects()->where('name',$subject_selected)->first()->id;
        $check_duplication = Attendance::where('date',$date)->where('subject_id',$subject_selected_id)->first();
		
        if($check_duplication == null)
            return response()->json(false, 200);
        else
            return response()->json(true, 200);
    }

}
