<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student', compact('id','name'));
    });

    Route::get('/course/{course}/{year?}', function ($course, $year= null) {
    return view('course', compact('course','year'));
    });

    Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = 'No') {
    return view('ojt', compact('company','city','allowance'));
    });

    Route::get('/event/{event}/{name}/{year}', function ($event, $name, $year) {
    return view('event', compact('event','name','year'));
    });
// Route::get('/', function () {
//     return view('welcome');
// });
