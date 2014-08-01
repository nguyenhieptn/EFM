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

//print App::environment();
Route::get('admin/','controllers\admin\UserController@login');

//admin user login system
Route::get("admin/user/login",'controllers\admin\UserController@login');
Route::post("admin/user/actionlogin",'controllers\admin\UserController@actionlogin');
Route::get("admin/user/logout",'controllers\admin\UserController@logout');


Route::filter('auth.admin', function() {
    // if not logged in redirect to the login page
    if (Auth::guest()) return Redirect::guest('admin/user/login');
});


//Admin route sections
Route::group(array("prefix"=>"admin",'before' => 'auth.admin'), function(){
    Route::get("dashboard/",'controllers\admin\DashController@index');
    Route::get("category/{cattype}",'controllers\admin\CategoryController@index');
    Route::resource("category",'controllers\admin\CategoryController');
    Route::resource("income",'controllers\admin\IncomeController');
});

//if no admin tried to access
