<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/students-list', [StudentController::class,'index'])->name('student.list');
Route::get('/students-create', [StudentController::class,'create'])->name('student.create');
Route::post('/students-store', [StudentController::class,'store'])->name('student.store');
