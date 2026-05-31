<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::get('students/{student}/download-qr', [StudentController::class, 'downloadQr'])->name('students.download-qr');