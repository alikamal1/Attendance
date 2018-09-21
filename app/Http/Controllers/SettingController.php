<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings_year = Setting::where('name','سنة')->get();
        $settings_study = Setting::where('name','دراسة')->get();
        $settings_stage= Setting::where('name','مرحلة')->get();
        $settings_branch = Setting::where('name','تخصص')->get();
        $settings_hours = Setting::where('name','ساعة')->get();
        $settings_case_type = Setting::where('name','حالة')->get();
        $settings_subject_type = Setting::where('name','مادة')->get();
        $settings_alert = Setting::where('name','انذرات')->get();
        
        return view('setting.index')
        ->with('settings_year',$settings_year)
        ->with('settings_study',$settings_study)
        ->with('settings_stage',$settings_stage)
        ->with('settings_branch',$settings_branch)
        ->with('settings_hours',$settings_hours)
        ->with('settings_case_type',$settings_case_type)
        ->with('settings_subject_type',$settings_subject_type)
        ->with('settings_alert',$settings_alert);

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
            'value' => 'required|unique:settings'
        ]);

        Setting::create([
            'name' => $request->name,
            'value' => $request->value,
        ]);
        Session::flash('success','تم الحفظ بنجاح');
        return redirect()->route('setting.index');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($setting_name)
    {
        return view('setting.create')->with('setting_name',$setting_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('setting.edit')->with('setting',Setting::find($id));
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
        $setting = Setting::find($id);

        $setting->name = $request->name;
        $setting->value = $request->value;

        $setting->save();
        Session::flash('success','تم التعديل بنجاح');
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);
        Session::flash('success','تم الحذف بنجاح');
        return redirect()->route('setting.index');
    }

  

}
