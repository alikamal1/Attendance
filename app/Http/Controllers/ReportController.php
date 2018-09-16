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
    public function index()
    {
    	return view('report.index');
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
}
