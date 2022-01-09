<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.login');
// return view('supervisor.portal.homepage');s
});
/////All routes on auth/////////////////////////////////////
Route::get('registration','homepageController@show_register')->name('show_register');
Route::post('reg','homepageController@Register')->name('reg');
Route::post('log','UserController@login')->name('log');


////////////////////All routes on supervisor////////////////////
Route::get('supervisor','SupervisorController@index')->name('add');
Route::get('all','SupervisorController@all')->name('all');
Route::post('add','SupervisorController@add')->name('add_supervisor');
Route::get('/Delete/{ids}','SupervisorController@delete');
Route::get('/Edit/{ids}','SupervisorController@ShowEdit');
Route::post('/Update','SupervisorController@Update')->name('update');
Route::get('create','ReportsController@supervisor')->name('addSupervisor');
Route::get('ASlogin','ReportsController@LoginSupervisor')->name('addLogin');
Route::post('supersign','ReportsController@CreateSupervisor')->name('super_sign');
Route::post('superlogin','ReportsController@LoginSuper')->name('create');
Route::get('/AssignedSupervisor','SupervisorController@assigned')->name('AssignedSupervisor');
Route::get('/SuperHomepage','SupervisorController@showHomePage')->name('SuperHomepage');


///////////////all routes on homepage/////////////////////
Route::get('homepage','homepageController@dashboard')->name('homepage');


///////////////All routes on reports////////////////
Route::get('addReports','ReportsController@showReports')->name('addReports');
Route::post('submitReports','ReportsController@upload')->name('submit_report');
Route::get('downloadReports','ReportsController@reports')->name('ViewReports');
Route::get('/download/{report}','fileController@download');


///////////////All routes on admin reports///////////////////
Route::get('reports','homepageController@Reports')->name('reports');

/////////////////All routes on projects//////////////////////
Route::post('projects','ProjectController@assign_project')->name('assigned_projects');
Route::get('all_assigned_projects','ProjectController@all_assigned_projects')->name('all_assigned_projects');
Route::get('/Edit/{ids}','ProjectController@ShowEdit');
Route::post('/Update_assignedProject','ProjectController@Update_assignedProject')->name('Update_assignedProject');
Route::get('/Delete/{ids}','ProjectController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
