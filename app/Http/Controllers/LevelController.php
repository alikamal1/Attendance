<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Level;
use Session;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('level.index')
        ->with('levels',Level::all())
        ->with('settings',Setting::all())
        ->with('years',Setting::where('name','سنة')->orderByDesc('created_at')->get());
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
            'year' => 'required',
            'study' => 'required',
            'stage' => 'required',
            'branch' => 'required',
        ]);

        Level::create([
            'year' => $request->year,
            'study' => $request->study,
            'stage' => $request->stage,
            'branch' => $request->branch,

        ]);
        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->route('level.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        return view('level.create')
        ->with('year',$year)
        ->with('settings',Setting::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('level.edit')->with('level',Level::find($id))
        ->with('settings',Setting::all());
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
        $level = Level::find($id);

        $level->year = $request->year;
        $level->study = $request->study;
        $level->stage = $request->stage;
        $level->branch = $request->branch;

        $level->save();
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::destroy($id);
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->route('level.index');
    }
}
