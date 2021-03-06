<?php

use App\Http\Controllers\ApplicationController;
use App\Models\Application;
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
    return view('welcome');
});

Route::get('/application-form', function () {
    return view('application-form');
});

Route::get('/applicants', function () {
    $users = Application::orderBy('id', 'desc')->get();
    return view('applicants', [
        'users' => $users
    ]);
});

