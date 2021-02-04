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



Route::get('about', function () {
    return view('about');
});

Route::get('work', function () {
    return view('work');
});

Route::get('login', function () {
    return view('login');
});



Route::get('/contact', 'ContactController@index');
Route::post('/contact/send', 'ContactController@ContactRequest'); 

Route::get('/', function () {
    return view('index');
});

// Route::get(     'login',                'AuthController@index'            );
Route::post(    'post-login',           'AuthController@postLogin'        );
Route::get(     'registration',         'AuthController@registration'     );
Route::post(    'post-registration',    'AuthController@postregistration' );
Route::get(     'dashboard',            'AuthController@dashboard'        );
Route::get(     'logout',               'AuthController@logout'           );