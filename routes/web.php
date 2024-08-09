<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TeacherController;
use App\Http\Controllers\Web\Student\Student;


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



Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.list');

Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');

//resource 
Route::resource('student' , Student::class);
Route::delete('/students/{id}', [Student::class, 'destroy'])->name('student.destroy');

