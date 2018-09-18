<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Student;
use App\Subject;
use App\SubjectPass;
use App\Attendance;

class ReportController extends Controller
{
    public function home()
    {
        return view('report.home');
    }

    public function index()
    {
    	return view('report.index');
    }

    public function index_subject_based()
    {
        return view('report.index_subject_based');
    }

    public function index_student_based()
    {
        return view('report.index_student_based');
    }

    public function show(Request $request)
    {
    	
    	$datefrom = $request->datefrom;
    	$dateto = $request->dateto;
    	$level_id = $request->level_id;

    	$subjects = Level::find($level_id)->subjects()->get();
    	$students = Level::find($level_id)->students()->get();

    	$level = Level::find($level_id);
    	$students = Student::where('level_id',$level_id)->get();

    	return view('report.show')->with('students',$students)
								    	->with('subjects',$subjects)
								    	->with('level',$level)
    									->with('datefrom',$datefrom)
    									->with('dateto',$dateto);
    }

    public function show_subject_based(Request $request)
    {
        
        $datefrom = $request->datefrom;
        $dateto = $request->dateto;
        $level_id = $request->level_id;
        $subject_id = $request->subject;

        $subjects = Subject::where('id',$subject_id)->get();
        $students = Level::find($level_id)->students()->get();

        $level = Level::find($level_id);
        $students = Student::where('level_id',$level_id)->get();

        return view('report.show')->with('students',$students)
                                        ->with('subjects',$subjects)
                                        ->with('level',$level)
                                        ->with('datefrom',$datefrom)
                                        ->with('dateto',$dateto);
    }

    public function show_student_based(Request $request)
    {
        $datefrom = $request->datefrom;
        $dateto = $request->dateto;
        $level_id = $request->level_id;
        $student_id = $request->student;

        $subjects = Student::find($student_id)->level()->first()->subjects()->get();

        $level = Level::find($level_id);
        $student = Student::find($student_id);

        $attendancesList = Student::find($student_id)->attendances()->whereBetween('date',[$datefrom,$dateto])->get()->groupBy('subject_id')->sortByDesc('created_at');


        return view('report.show_student_based')->with('attendancesList',$attendancesList)
                                        ->with('subjects',$subjects)
                                        ->with('student',$student)
                                        ->with('level',$level)
                                        ->with('datefrom',$datefrom)
                                        ->with('dateto',$dateto);
    }
}
