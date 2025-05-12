<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.main');
});

Route::view('/create-course' ,'courses.create-course')->name('create-course');
Route::post('/create-course', [CourseController::class, 'createCourse'])->name('create-course');
Route::get('/courses' , [CourseController::class, 'getCourses'])->name('courses');
Route::get('/courses/{course}' , [CourseController::class, 'getCoursePublications'])->name('getCoursePublications');

Route::get('/tests', [TestController::class, 'getMyTests'])->name('getMyTests');
Route::view('/tests/constructor', 'tests.test-constructor')->name('testConstructor');
Route::get('/tests/{test}/constructor', [TestController::class, 'changeTest'])->name('changeTest');
Route::post('/tests/create', [TestController::class, 'createTest'])->name('createTest');
Route::post('/tests/save', [TestController::class, 'saveTest'])->name('saveTest');
