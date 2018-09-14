<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Setting;
use App\Subejct;

class AjaxGetController extends Controller
{
	public function getyear()
    {
    	$year = Setting::where('name','سنة')->orderByDesc('created_at')->get();
    	return response()->json(array('data'=> $year), 200);
    }

    public function getstudy($year)
    {
    	$study = Level::where('year',$year)->get()->unique('study');
    	return response()->json(array('data'=> $study), 200);
    }

    public function getstage($year,$study)
    {
    	$stage = Level::where('year',$year)->where('study',$study)->get()->unique('stage');
    	return response()->json(array('data'=> $stage), 200);
    }

    public function getbranch($year,$study,$stage)
    {
    	$branch = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->get()->unique('branch');
    	return response()->json(array('data'=> $branch), 200);
    }

    public function getsubject($year,$study,$stage,$branch)
    {
    	
    	$level_id = Level::where('year',$year)->where('study',$study)->where('stage',$stage)->where('branch',$branch)->first();
    	$subject = Level::find($level_id)->first()->subjects()->get()->toarray();
    	return response()->json(array('data'=> $subject), 200);
    }
}
