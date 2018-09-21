<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectTeacher;
use App\Teacher;
use Session;

class TeacherSubjectController extends Controller
{

	public function home()
	{
		return view('teacher_subject.home');
	}

	public function index()
	{
		return view('teacher_subject.index');
	}

	public function show(Request $request)
	{

		$teachers = Teacher::all();
		return view('teacher_subject.show')->with('teachers',$teachers)
											->with('year',$request->year);
	}
    
	public function create()
	{
		return view('teacher_subject.create');
	}

	public function store(Request $request)
	{
		$subject_id = $request->subject;
		foreach($request->teachers as $teacher)
		{
			SubjectTeacher::create([
				'teacher_id' => $teacher,
				'subject_id' => $subject_id,
			]);
		}

		Session::flash('success',' تم حفظ المعلومات بنجاح ');
        return redirect()->route('teacher_subject.create');

	}

	public function destroy($subject_id,$teacher_id,$year)
    {
        $id = SubjectTeacher::where('subject_id',$subject_id)->where('teacher_id',$teacher_id)->first()->id;
        
        SubjectTeacher::destroy($id);

        Session::flash('success','تم الحذف بنجاح');

        $teachers = Teacher::all();
		return view('teacher_subject.show')->with('teachers',$teachers)
											->with('year',$year);
    }

}
