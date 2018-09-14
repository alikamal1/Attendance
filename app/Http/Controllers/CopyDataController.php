<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Http\Controllers\AjaxGetController;
class CopyDataController extends Controller
{

	private $ajaxGetController;

	public function __construct()
    {
        $this->ajaxGetController = new AjaxGetController();
    }

    public function index()
    {

    	$levels = Level::all();
    	return view('copy.index')->with('levels',$levels);;
    }

    public function getStudy($year)
    {
        return $this->ajaxGetController->getStudy($year);
    }

    
}
