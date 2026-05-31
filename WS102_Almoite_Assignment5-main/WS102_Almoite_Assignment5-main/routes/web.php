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

    Route::get('/evaluation/{name}/{prelim}/{midterm}/{final}', function ($name, $prelim, $midterm, $final) {
    return view('evaluation', compact('name','prelim','midterm','final'));
    });


// Route::get('/', function () {
//     return view('welcome');
// });
