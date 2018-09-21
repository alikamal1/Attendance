<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Subject;
use App\Student;
use Session;
// use App\Http\Controllers\AjaxGetController;
class CopyDataController extends Controller
{


	// private $ajaxGetController;

	// public function __construct()
 //    {
 //        $this->ajaxGetController = new AjaxGetController();
 //    }

    public function index()
    {
        return view('copy.index');
    }

    public function copyStudentindex()
    {
        
        return view('copy.copystudents');

    }

    public function copySubjectindex()
    {
        
        return view('copy.copysubjects');

    }

    public function copyStudent(Request $request)
    {


        $oldLevelId = $request->level_id1;
        $newLevelId = $request->level_id2;

        Student::where('level_id',$newLevelId)->delete();

        foreach (Student::where('level_id',$oldLevelId)->get() as $oldStudent)
        {
            Student::create([
                'name' => $oldStudent->name,
                'level_id' => $newLevelId
            ]);
        }
        
    	Session::flash('success',' تمت عملية النسخ بنجاح ');

        return redirect()->back();

    }

    public function copySubject(Request $request)
    {

        $oldLevelId = $request->level_id1;
        $newLevelId = $request->level_id2;

        Subject::where('level_id',$newLevelId)->delete();

        foreach (Subject::where('level_id',$oldLevelId)->get() as $oldSubject)
        {
            Subject::create([
                'name' => $oldSubject->name,
                'hours' => $oldSubject->hours,
                'subject_type' => $oldSubject->subject_type,
                'level_id' => $newLevelId
            ]);
        }
        
        Session::flash('success',' تمت عملية النسخ بنجاح ');

        return redirect()->back();

    }

    // public function getStudy($year)
    // {
    //     return $this->ajaxGetController->getStudy($year);
    // }

    
}
