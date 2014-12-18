<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//valid all post request
Route::when('*', 'csrf', array('post'));

//GUESS acess
Route::get('/',"UserController@login");
Route::get('/login','UserController@login');
Route::post('/actionlogin','UserController@doLogin');
Route::get('/user/logout','UserController@logout');


/*
 * Normal user SECTIONS
 */
Route::group(array("before"=>"Sentry"), function(){
    Route::get('dashboard',['as'=>'dashboard','uses'=>'DashController@index']);
    Route::get('/logout','UserController@logout');
    Route::get('/user/selfedit','UserController@selfedit');
    Route::put('/user/selfupdate',['as'=>'user.selfupdate','uses'=>'UserController@selfUpdate']);

    //Users Section
    Route::resource('users', 'UserController');
    Route::get('users/member/{id}', 'UserController@showMember');

    //Finance Section
    Route::group(["prefix"=>"finance"],function(){
        Route::get("category/{cattype}",'CategoryController@index');
        Route::resource("category",'CategoryController');
        Route::resource("income",'IncomeController');
        Route::resource("expense",'ExpenseController');
        Route::get("report",'ReportController@index');
    });

});