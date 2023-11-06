<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\CustomLoginController as ControllersCustomLoginController;
use App\Http\Controllers\ShowLogsController;

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
    return view('welcome');
});

// routes/web.php


// Route::post('/login', [ControllersCustomLoginController::class, 'sendFailedLoginResponse']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Route::post('/login', 'Auth\LoginController@login')->middleware('checksqlinjection');


Route::get('/Alerts/Notification',[ShowLogsController::class,'index']);