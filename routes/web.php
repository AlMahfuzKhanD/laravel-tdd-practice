<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/students-list', [StudentController::class,'index'])->name('student.list');
Route::get('/students-create', [StudentController::class,'create'])->name('student.create');
Route::post('/students-store', [StudentController::class,'store'])->name('student.store');
Route::delete('/students-destroy/{id}', [StudentController::class,'destroy'])->name('student.destroy');
Route::get('/students-edit/{id}', [StudentController::class,'edit'])->name('student.edit');
Route::put('/students-update/{id}', [StudentController::class,'update'])->name('student.update');
