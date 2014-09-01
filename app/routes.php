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
//Route::get('/index.php','controllers\admin\UserController@login');
Route::get('/','controllers\admin\UserController@login');

//admin user login system
Route::get("user/login",'controllers\admin\UserController@login');
Route::get("user/register",'controllers\admin\UserController@create');
Route::post("user/store",'controllers\admin\UserController@store');
Route::post("user/actionlogin",'controllers\admin\UserController@actionlogin');
Route::get("user/logout",'controllers\admin\UserController@logout');

// ALL FILTER HERE
//csrf filter
Route::filter('csrf', function()
{
    if (Request::getMethod() !== 'GET' && Session::token() != Input::get('_token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

//Guest filter
Route::filter('auth.admin', function() {
    // if not logged in redirect to the login page
    if (Auth::guest()) return Redirect::guest('user/login');
});



//Admin route sections
Route::group(array('before' => 'auth.admin'), function(){
    Route::get("dashboard/",'controllers\admin\DashController@index');
    Route::get("category/{cattype}",'controllers\admin\CategoryController@index');
    Route::resource("category",'controllers\admin\CategoryController');
    Route::resource("income",'controllers\admin\IncomeController');
    Route::resource("expense",'controllers\admin\ExpenseController');
    Route::resource("account",'controllers\admin\AccountController');
    Route::resource("report",'controllers\admin\ReportController');
    Route::resource("reportyear",'controllers\admin\ReportYearController');
});


//api
Route::group(array('prefix'=>'api','before' => 'auth.admin'), function(){
    Route::resource("expense",'controllers\api\v1\ExpenseApiController');

});






