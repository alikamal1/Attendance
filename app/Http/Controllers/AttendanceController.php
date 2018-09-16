<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AjaxGetController;
use App\Level;
use App\Subject;
use App\Student; 
use App\Attendance;
use App\SubjectPass;
use Session;

class AttendanceController extends Controller
{
	// private $ajaxGetController;
	// public function __construct()
 //    {
 //        $this->ajaxGetController = new AjaxGetController();
 //    }
 //    public function getYear()
 //    {
 //        return $this->ajaxGetController->getyear($year);
 //    }

    public function index()
    {
    	return view('attendance.index');
    }

    public function record(Request $request)
    {
    	$date = $request->date;
    	$subject_id = $request->subject;

    	$subject = Subject::find($subject_id)->name;
        $hours = Subject::find($subject_id)->hours;
    	$level_id = Subject::find($subject_id)->level_id;
    	$level = Level::find($level_id);
    	$students = Student::where('level_id',$level_id)->get();

    	return view('attendance.record')->with('students',$students)
    									->with('level',$level)
    									->with('date',$date)
    									->with('subject',$subject)
                                        ->with('hours',$hours)
    									->with('subject_id',$subject_id);

    }

    public function store(Request $request)
    {	
    	$date = $request->date;
        $hours = $request->hours;
    	$subject_id = $request->subject_id;
    	$subject_teacher_id = 0;
    	$allow = 0;

    	$requeestData = $request->request;
    	$requeestData = $request->except(['date','subject_id','hours']);

    	foreach($requeestData as  $student_id => $status)
    	{
    		// echo $student_id. '   ' . $status.'<br>';
    		Attendance::create([
    			'student_id' => $student_id,
    			'subject_id' => $subject_id,
    			'subject_teacher_id' => $subject_teacher_id,
    			'status' => $status,
    			'date' => $date,
    			'allow' => $allow,
    		]);
    	}

        $subject_pass = SubjectPass::where('subject_id',$subject_id)->first();
        if ($subject_pass)
        {
            $subject_pass->hours_count = $subject_pass->hours_count + $hours;
            $subject_pass->save();
        } else {
            SubjectPass::create([
            'subject_id' => $subject_id,
            'hours_count' => $hours
            ]);
        }

        

        Session::flash('success','تم تسجيل قائمة الحضور بنجاح');
        return redirect()->route('attendance.index');
    	
    }

    public function show()
    {
    	return view('attendance.show');
    }


    public function edit($subject_id, $date)
    {
    	$date = $date;
    	$subject_id = $subject_id;

    	$subject = Subject::find($subject_id)->name;
    	$level_id = Subject::find($subject_id)->level_id;
    	$level = Level::find($level_id);
    	$students = Student::where('level_id',$level_id)->get();
    	$attendances = Attendance::where('subject_id',$subject_id)->where('date',$date)->get();

    	return view('attendance.edit')->with('students',$students)
    									->with('level',$level)
    									->with('date',$date)
    									->with('subject',$subject)
    									->with('subject_id',$subject_id)
    									->with('attendances',$attendances);
    }

    public function update(Request $request)
    {

    	$date = $request->date;
    	$subject_id = $request->subject_id;
    	$subject_teacher_id = 0;
    	$allow = 0;

    	$requeestData = $request->request;
    	$requeestData = $request->except(['date','subject_id']);

    	foreach($requeestData as  $student_id => $status)
    	{
    		$attendance = Attendance::where('student_id',$student_id)->where('date',$date)->where('subject_id',$subject_id)->first();
    		$attendance->status =  $status;
    		$attendance->save();
    	}

        Session::flash('success','تم تحديث قائمة الحضور بنجاح');
        return redirect()->route('attendance.show');
    }

    public function delete($subject_id, $date)
    {
    	$attendances = Attendance::where('subject_id',$subject_id)->where('date',$date)->get();

    	foreach ($attendances as $attendance) {
    		$attendance->delete();
    	}

        $hours = Subject::find($subject_id)->hours;
        $subject_pass = SubjectPass::where('subject_id',$subject_id)->first();
        $subject_pass->hours_count = $subject_pass->hours_count - $hours;
        $subject_pass->save();

    	Session::flash('success','تم حذف قائمة الغياب بنجاح');
        return redirect()->route('attendance.show');
    }
    
}
