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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

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

Route::get('/teacher/select/{subject_id}/{teacher_id}/{level_id}','TeacherController@select')->name('teacher.select');
Route::get('/teacher/unselect/{subject_id}/{teacher_id}/{level_id}','TeacherController@unselect')->name('teacher.unselect');
Route::get('/teacher/subject_teacher/{teacher_id}/{level_id}', 'TeacherController@subject_teacher')->name('teacher.subject_teacher');
Route::resource('/teacher', 'TeacherController');

Route::get('/copy/getstudy/{year}','CopyDataController@getstudy')->name('copy.getstudy');
Route::get('/copy/','CopyDataController@index')->name('copy.index');

Route::resource('/level','LevelController');

Route::get('/ajax/getyear','AjaxGetController@getyear');
Route::get('/ajax/getstudy/{year}','AjaxGetController@getstudy');
Route::get('/ajax/getstage/{year}/{study}','AjaxGetController@getstage');
Route::get('/ajax/getbranch/{year}/{study}/{stage}','AjaxGetController@getbranch');
Route::get('/ajax/getsubject/{year}/{study}/{stage}/{subject}','AjaxGetController@getsubject');



Route::get('/attendance','AttendanceController@index')->name('attendance.index');



