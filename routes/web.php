<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::group(['middleware' => 'auth'], function() {
 
Route::get('/', function () {
    return view('index');
})->name('index');  

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/setting','SettingController');

Route::post('/student/excel/{level_id}', 'StudentController@import')->name('students.import');;
Route::get('/student/excel/{id}','StudentController@excel')->name('students.excel');
Route::get('/student/studentcreate/{id}','StudentController@studentcreate')->name('students.studentcreate');
Route::resource('/student','StudentController');

Route::get('/subject/subjectedit/{id}/{level_id}','SubjectController@subjectedit')->name('subject.subjectedit');
Route::get('/subject/destroysubject/{id}/{level_id}','SubjectController@destroysubject')->name('subject.destroysubject');
Route::get('/subject/subjectcreate/{id}','SubjectController@subjectcreate')->name('subject.subjectcreate');
Route::get('/subject/showsubject/{level_id}', 'subjectController@showsubject')->name('subject.showsubject');
Route::resource('/subject','SubjectController');

Route::resource('/teacher', 'TeacherController');

Route::get('/copy/getstudy/{year}','CopyDataController@getstudy')->name('copy.getstudy');
Route::get('/copy/','CopyDataController@index')->name('copy.index');

Route::resource('/level','LevelController');

Route::get('/ajax/getyear','AjaxGetController@getyear');
Route::get('/ajax/getstudy/{year}','AjaxGetController@getstudy');
Route::get('/ajax/getstage/{year}/{study}','AjaxGetController@getstage');
Route::get('/ajax/getbranch/{year}/{study}/{stage}','AjaxGetController@getbranch');
Route::get('/ajax/getsubject/{year}/{study}/{stage}/{branch}','AjaxGetController@getsubject');
Route::get('/ajax/getattendancelist/{subject_id}','AjaxGetController@getattendancelist');
Route::get('/ajax/getlevelid/{year}/{study}/{stage}/{branch}','AjaxGetController@getlevelid');
Route::get('/ajax/getstudents/{year}/{study}/{stage}/{branch}','AjaxGetController@getstudents');
Route::get('/ajax/getteachers/','AjaxGetController@getteachers');
Route::get('/ajax/getratio/','AjaxGetController@getratio');







Route::get('/attendance','AttendanceController@index')->name('attendance.index');
Route::get('/attendance/record','AttendanceController@record')->name('attendance.record');
Route::get('/attendance/store','AttendanceController@store')->name('attendance.store');
Route::get('/attendance/show','AttendanceController@show')->name('attendance.show');
Route::get('/attendance/showList','AttendanceController@showList')->name('attendance.showList');
Route::get('/attendance/edit','AttendanceController@edit')->name('attendance.edit');
Route::get('/attendance/edit/{subject_id}/{date}','AttendanceController@edit')->name('attendance.edit');
Route::get('/attendance/update','AttendanceController@update')->name('attendance.update');
Route::get('/attendance/delete/{subject_id}/{date}','AttendanceController@delete')->name('attendance.delete');
Route::get('/attendance/allow/{subject_id}/{date}','AttendanceController@allow')->name('attendance.allow');
Route::get('/attendance/updateallow','AttendanceController@updateallow')->name('attendance.updateallow');

Route::get('/report','ReportController@home')->name('report.home');
Route::get('/report/index','ReportController@index')->name('report.index');
Route::get('/report/show','ReportController@show')->name('report.show');
Route::get('/report/index_subject_based','ReportController@index_subject_based')->name('report.index_subject_based');
Route::get('/report/show_subject_based','ReportController@show_subject_based')->name('report.show_subject_based');
Route::get('/report/index_student_based','ReportController@index_student_based')->name('report.index_student_based');
Route::get('/report/show_student_based','ReportController@show_student_based')->name('report.show_student_based');
Route::get('/report/index_absent','ReportController@index_absent')->name('report.index_absent');
Route::get('/report/show_absent','ReportController@show_absent')->name('report.show_absent');

Route::get('/special_case/{student_id}','SpecialCaseController@index')->name('special_case.index');
Route::get('/special_case/create/{student_id}','SpecialCaseController@create')->name('special_case.create');
Route::post('/special_case/store','SpecialCaseController@store')->name('special_case.store');
Route::get('/special_case/destroy/{special_case_id}/{student_id}','SpecialCaseController@destroy')->name('special_case.destroy');
Route::get('/special_case/edit/{special_case_id}/{student_id}','SpecialCaseController@edit')->name('special_case.edit');
Route::post('/special_case/update','SpecialCaseController@update')->name('special_case.update');

Route::get('/teacher_subject/home','TeacherSubjectController@home')->name('teacher_subject.home');
Route::get('/teacher_subject/index','TeacherSubjectController@index')->name('teacher_subject.index');
Route::get('/teacher_subject/show','TeacherSubjectController@show')->name('teacher_subject.show');
Route::get('/teacher_subject/create','TeacherSubjectController@create')->name('teacher_subject.create');
Route::get('/teacher_subject/store','TeacherSubjectController@store')->name('teacher_subject.store');
Route::get('/teacher_subject/destroy/{subject_id}/{teacher_id}/{year}','TeacherSubjectController@destroy')->name('teacher_subject.destroy');

Route::get('/copydata','CopyDataController@index')->name('copy.index');
Route::get('/copydata/copystudentindex','CopyDataController@copyStudentindex')->name('copy.studentindex');
Route::get('/copydata/copysubjectindex','CopyDataController@copySubjectindex')->name('copy.subjectindex');
Route::get('/copydatastudents','CopyDataController@copyStudent')->name('copy.student');
Route::get('/copydatasubjects','CopyDataController@copySubject')->name('copy.subject');



});








