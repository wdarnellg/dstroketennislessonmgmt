<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('/', function () {
        
        return view('welcome');
    });
    
    Route::get('/home', 'HomeController@index');


//Admin Routes///////////////////////////////////////////////////////////////////////////
    Route::get('/dashboard', 'HomeController@admin')->middleware('admin');
    Route::auth();
    Route::get('/packageform', 'AdminController@getPackageform')->middleware('admin');
    Route::post('/packageform', 'AdminController@postCreatePackage')->middleware('admin');

//End Admin Routes//////////////////////////////////////////////////////////////////////


//User - Family Routes//////////////////////////////////////////////////////////////////
   Route::get('/users', 'AdminController@getusers')->middleware('admin');
   Route::get('/users/{families}', 'AdminController@showfamily')->middleware('auth');
   Route::get('/users/{families}/familyedit', 'AdminController@FamilyEdit')->middleware('admin');
   Route::post('/users', 'AdminController@storeUser')->middleware('admin');
   Route::post('/users/{families}/players', 'AdminController@storePlayer')->middleware('admin');
   Route::patch('/users/{families}', 'UserController@update')->middleware('admin');
//End User - Family Routes///////////////////////////////////////////////////////////////

//Players Routes/////////////////////////////////////////////////////////////////////////
    Route::get('players', 'AdminController@getPlayers')->middleware('admin');
    Route::get('/players/{players}', 'AdminController@playershow')->middleware('admin');
    Route::get('/players/{player}/playeredit', 'PlayerController@edit')->middleware('admin');
    Route::post('/players/{players}/lessonhours', 'AdminController@storeLessonHours')->middleware('admin');
    Route::patch('/players/{player}', 'PlayerController@update')->middleware('admin');
//End Players Routes/////////////////////////////////////////////////////////////////////

//Lessonhours Routes/////////////////////////////////////////////////////////////////////
    Route::get('/lessonhours/', 'AdminController@getLessonHours')->middleware('admin');
    Route::get('/lessonhours/{lessonhours}', 'AdminController@Lessonhoursshow')->middleware('admin');
    Route::post('/lessonhours/{lessonhours}/hoursused', 'AdminController@storeHoursUsed')->middleware('admin');
//End Lessonhours Routes//////////////////////////////////////////////////////////////////

//Accounts Routes/////////////////////////////////////////////////////////////////////////
    Route::get('/mylessonhours', 'PlayerController@getMyLessonhours')->middleware('auth');
    Route::get('/mylessonhours/{lessonhours}', 'PlayerController@getMyHoursused')->middleware('auth');
    Route::get('/myfamilyprofile', 'UserController@getMyFamilyProfile')->middleware('auth');
    Route::post('/myfamilyprofile/{families}/players', 'UserController@storePlayer')->middleware('auth');
//End Accounts Routes//////////////////////////////////////////////////////////////////////