<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Level;
use App\Subject;
use Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject.index')->with('years',Setting::where('name','سنة')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create')->with('level',Level::all())->with('setting',Setting::all());
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
            'hours' => 'required',
            'subject_type' => 'required',
        ]);

        Subject::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
            'hours' => $request->hours,
            'subject_type' => $request->subject_type,
        ]);
        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->route('subject.showsubject',$request->year);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('subject.show')->with('subject',Subject::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'name' => 'required',
            'level_id' => 'required',
            'hours' => 'required',
            'subject_type' => 'required',
        ]);

        $subject = Subject::find($id);

        $subject->name = $request->name;
        $subject->hours = $request->hours;
        $subject->subject_type = $request->subject_type;
        $subject->level_id = $request->level_id;

        $subject->save();
        Session::flash('success','تم التعديل بنجاح');

        return redirect()->route('subject.showsubject', $request->year);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function showsubject($year)
    {

        return view('subject.show')
        ->with('levels',Level::where('year',$year)->get());
    }

    public function subjectcreate($id)
    {
        return view('subject.create')
        ->with('hours',Setting::where('name','ساعة')->get())
        ->with('subject_types',Setting::where('name','مادة')->get())
        ->with('level',Level::find($id));
    }

    public function subjectedit($id,$year)
    {
        return view('subject.edit')
        ->with('hours',Setting::where('name','ساعة')->get())
        ->with('subject_types',Setting::where('name','مادة')->get())
        ->with('subject',Subject::find($id))
        ->with('year',$year);
    }
    public function destroysubject($id,$year)
    {
        Subject::destroy($id);
        Session::flash('success','تم الحذف بنجاح');

        return redirect()->route('subject.showsubject',$year);
    }
        
}
