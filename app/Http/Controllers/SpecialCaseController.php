<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Setting;
use App\SpecialCase;
use Session;

class SpecialCaseController extends Controller
{
    public function index($student_id)
    {
    	$level = Student::find($student_id)->level()->first();
        $student = Student::find($student_id);
        return view('special_case.index')
        ->with('level',$level)
        ->with('student', $student);
    }

    public function create($student_id)
    {

    	$level = Student::find($student_id)->level()->first();
        $student = Student::find($student_id);
        $special_cases = Setting::where('name','حالة')->get();
        return view('special_case.create')
        ->with('level',$level)
        ->with('student', $student)
        ->with('special_cases', $special_cases);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'subject_id' => 'required',
            'student_id' => 'required',
            'special_case' => 'required',
        ]);

    	SpecialCase::create([
    		'subject_id' => $request->subject_id,
    		'student_id' => $request->student_id,
    		'case_type' => $request->special_case,
    	]);

    	Session::flash('success','  تم اضافة حالة الطالب بنجاح');
        return redirect()->route('special_case.index',['student_id'=>$request->student_id]);
    }

    public function edit($special_case_id,$student_id)
    {
    	$level = Student::find($student_id)->level()->first();
        $student = Student::find($student_id);
        $special_cases = Setting::where('name','حالة')->get();
        $student_special_case = SpecialCase::find($special_case_id);
        return view('special_case.edit')
        ->with('level',$level)
        ->with('student', $student)
        ->with('special_cases', $special_cases)
        ->with('student_special_case',$student_special_case);
    }

    public function update(Request $request)
    {
    	$this->validate($request,[
            'subject_id' => 'required',
            'student_id' => 'required',
            'special_case' => 'required',
        ]);

    	SpecialCase::find($request->student_special_case)->update([
    		'subject_id' => $request->subject_id,
    		'student_id' => $request->student_id,
    		'case_type' => $request->special_case,
    	]);

    	Session::flash('success',' تم تعديل المعلومات بنجاح');
        return redirect()->route('special_case.index',['student_id'=>$request->student_id]);
    }

    public function destroy($special_case_id,$student_id)
    {
        SpecialCase::destroy($special_case_id);
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->route('special_case.index',['student_id'=>$student_id]);
    }
}
