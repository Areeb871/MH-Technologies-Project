<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_controller;
use App\Http\Controllers\Role_controller;
use App\Http\Controllers\Student_controller;
use App\Http\Controllers\Lecture_controller;
use App\Http\Controllers\Section_controller;
use App\Http\Controllers\Attendence_controller;
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
/*
Route::get('/', function () {
    return view('admin');
});
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create/role', [Role_controller::class, 'create'])->name('role.create')->middleware('roles:admin');

Route::post('/role', [Role_controller::class, 'store'])->name('role.store')->middleware('roles:admin');

Route::get('/role/list', [Role_controller::class, 'index'])->name('role.list')->middleware('roles:admin,student');

Route::get('/create/user', [User_controller::class, 'create'])
->name('user.create')->middleware('roles:admin');
Route::post('/user', [User_controller::class, 'store'])->name('user.store')->middleware('roles:admin');
Route::get('/show', [User_controller::class, 'show'])->name('user.show')->middleware('roles:admin,Student,teacher');
Route::get('/users/{user}/edit',[User_controller::class, 'edit'])->name('user.edit')->middleware('roles:admin');
Route::put('/users/{user}',[User_controller::class, 'update'])->name('user.update')->middleware('roles:admin');
Route::delete('/users/{user}',[User_controller::class, 'destroy'])->name('user.destroy')->middleware('roles:admin');
Route::get('/user/timetable', [User_controller::class, 'showTimetable'])->name('user.timetable')->middleware('roles:admin,Student,teacher');

 
Route::get('/create/lecture', [Lecture_controller::class, 'create'])->name('lectures.create')->middleware('roles:admin');
Route::post('/lecture', [Lecture_controller::class, 'store'])->name('lectures.store')->middleware('roles:admin');
Route::get('/show2/{id}', [Lecture_controller::class, 'show'])->name('lectures.show')->middleware('roles:admin,Student,teacher');
Route::get('/lectures/{lecture}/edit',[Lecture_controller::class, 'edit'])->name('lectures.edit')->middleware('roles:admin');
Route::put('/lectures/{lecture}',[Lecture_controller::class, 'update'])->name('lectures.update')->middleware('roles:admin');
Route::delete('/lectures/{lecture}',[Lecture_controller::class, 'destroy'])->name('lectures.destroy')->middleware('roles:admin');


Route::get('/sections/create', [Section_controller::class, 'create'])->name('sections.create');
Route::post('/sections', [Section_controller::class, 'store'])->name('sections.store');
Route::get('/show/{id}', [Section_controller::class, 'show'])->name('sections.show');
Route::get('/sections/{id}/edit', [Section_controller::class, 'edit'])->name('sections.edit');
Route::put('/sections/{id}', [Section_controller::class, 'update'])->name('sections.update');
Route::delete('/sections/{id}', [Section_controller::class, 'destroy'])->name('sections.destroy');


Route::post('/attendance/store/{section}', [Attendence_controller::class, 'store'])->name('attendance.store')->middleware('roles:teacher');
Route::get('/attendance', [Attendence_controller::class, 'show'])->name('attendance.show')->middleware('roles:Student');
