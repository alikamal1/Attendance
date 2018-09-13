<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Level;
use App\Setting;
use App\SubjectTeacher;
use Hash;
use Session;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index')->with('teachers',Teacher::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('teacher.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        Teacher::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $levels = Level::all()->sortByDesc('year')->groupBy('year');
        return view('teacher.show')
        ->with('teacher',Teacher::find($id)->first())
        ->with('levels',$levels);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('teacher.edit')
        ->with('teacher',Teacher::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        $teacher = Teacher::find($id);

        $teacher->username = $request->username;
        $teacher->password =Hash::make($request->password);

        $teacher->save();
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Teacher::destroy($id);
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->route('teacher.index');
    }

    public function subject_teacher($teacher_id, $level_id)
    {
        
        return view('teacher.subject_teacher')
        ->with('teacher',Teacher::find($teacher_id))
        ->with('level',Level::find($level_id))
        ->with('s_t',SubjectTeacher::where('teacher_id',$teacher_id)->get());
    
    }

    public function select($subject_id,$teacher_id,$level_id)
    {
        SubjectTeacher::create([
            'subject_id' => $subject_id,
            'teacher_id' => $teacher_id
        ]);

        Session::flash('success','تم الحفظ بنجاح');

        return view('teacher.subject_teacher')
        ->with('teacher',Teacher::find($teacher_id))
        ->with('level',Level::find($level_id))
        ->with('s_t',SubjectTeacher::where('teacher_id',$teacher_id)->get());

    }

    public function unselect($subject_id,$teacher_id,$level_id)
    {
        $id = SubjectTeacher::where('subject_id',$subject_id)->where('teacher_id',$teacher_id)->first()->id;
        
        SubjectTeacher::destroy($id);

        Session::flash('success','تم الحذف بنجاح');

        return view('teacher.subject_teacher')
        ->with('teacher',Teacher::find($teacher_id))
        ->with('level',Level::find($level_id))
        ->with('s_t',SubjectTeacher::where('teacher_id',$teacher_id)->get());
    }
}
