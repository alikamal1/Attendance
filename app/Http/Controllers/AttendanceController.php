<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AjaxGetController;

class AttendanceController extends Controller
{
	// private $ajaxGetController;
	// public function __construct()
 //    {
 //        $this->ajaxGetController = new AjaxGetController();
 //    }
 //    public function getYear()
 //    {
 //        return $this->ajaxGetController->getyear($year);
 //    }

    public function index()
    {
    	return view('attendance.index');
    }

    
}
