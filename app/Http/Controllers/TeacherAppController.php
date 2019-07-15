<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Level;
use Hash;
use Session;
use App\Subject;
use App\Student; 
use App\Attendance;
use App\SubjectPass;
class TeacherAppController extends Controller
{

    public function login()
    {
        return view('teacher_app.login');
    }

    public function loginRequest(Request $request)
    {

        $teacherPasswords = Teacher::where('username',$request->username)->first()->password;

        $teacher = Teacher::where('username',$request->username)->where('password',Hash::check($request->teacherPasswords,$teacherPasswords))->first();
        

        return view('teacher_app.attendance')->with('teacher',$teacher->username);
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

    	return view('teacher_app.record')->with('students',$students)
    									->with('level',$level)
    									->with('date',$date)
    									->with('subject',$subject)
                                        ->with('hours',$hours)->with('teacher',$request->teacher)
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
    	$requeestData = $request->except(['date','subject_id','hours','teacher']);

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
        return view('teacher_app.attendance')->with('teacher',$request->teacher);    	
    }


}
