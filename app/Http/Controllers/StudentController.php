<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Setting;
use App\Level;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index')->with('levels',Level::all())
        ->with('settings',Setting::all())
        ->with('years',Setting::where('name','سنة')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required',
            'level_id' => 'required',
        ]);


        Student::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
        ]);
        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->route('student.show',$request->level_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.show')
        ->with('level',Level::find($id))
        ->with('students',Student::where('level_id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $level_id = Student::find($id)->level_id;
        $year = Level::find($level_id)->year;
        $levels = Level::where('year',$year)->get();

        $studentLevel = Level::find($level_id);
        return view('student.edit')
        ->with('levels',$levels)
        ->with('student',Student::find($id))
        ->with('studentLevel',$studentLevel);
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
            'study' => 'required',
            'stage' => 'required',
            'branch' => 'required',
        ]);
        $level_id = Level::where([
            ['year' , $request->year],
            ['study' , $request->study],
            ['stage' , $request->stage],
            ['branch' , $request->branch],
        ])->first()->id;

        $student = Student::find($id);

        $student->name = $request->name;
        $student->level_id =$level_id;

        $student->save();
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->route('student.show',$level_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level_id = Student::find($id)->level_id;
        Student::destroy($id);
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->route('student.show',$level_id);
    }

    public function studentcreate($id)
    {
        return view('student.create')
        ->with('level',Level::find($id));
    }
}
