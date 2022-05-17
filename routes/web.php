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

Route::get('/Student', function () {
    return view('welcomeStudent');
})->name('Student');

Route::resource('/Teacher','ScheduleController')->names('Teacher');

Route::get('/room', function () {
    return view('welcomeRoom');
})->name('room');

Route::get('test', function () {
    return view('testTemplate');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::fallback(function () {
    return 'Резервный маршрут';
});



