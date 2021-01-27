<?php

// use App\Http\Controllers\ClasseController;
// use App\Http\Controllers\CourController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\TeacherController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia\Inertia::render('Dashboard');
// })->name('dashboard');

Route::middleware('auth')->group(function(){
	Route::get('/','ClasseController@index');
	Route::resource('classes', ClasseController::class);
	Route::resource('courses', CourController::class);
	Route::resource('teachers', TeacherController::class);
	Route::resource('students', StudentController::class);
	Route::resource('notes', NoteController::class);
	Route::get('student_list/{id}', 'ClasseController@student_list')->name('student_list');

	Route::get('anuler',[NoteController::class,'anuler']);

});