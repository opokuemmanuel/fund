<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/////////All routes on authentication///////////////////
Route::post('Register','RegisterController@Register');
//Route::post('Login','RegisterController@Login');

/////////////All routes on profile////////////////////////
Route::post('profile','ProfileController@Profile');


////////////////All routes on projects///////////
Route::post('project','ProjectController@add_project');


Route::get('/Delete/{ids}','ProjectController@delete');

////////////////////////All routes on mobile money////////////////////////////
Route::post('/send','MoneyController@money');



///////////////All routes on comments///////////////////
Route::post('comment','CommentsController@add_comments');

