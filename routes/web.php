<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('courses');
});

Route::get('/courses', [CourseController::class, 'getCourses'])->name('courses');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logoutUser'])->name('logout');

    Route::view('/courses/create','courses.create-course')->name('create-course');
    Route::post('/courses/create', [CourseController::class, 'createCourse'])->name('create-course');
    Route::get('/courses/{course}', [CourseController::class, 'getCoursePublications'])->name('getCoursePublications');
    Route::get('courses/{course}/add/tests', [TestController::class, 'getMyTests'])->name('testsListForAddToCourse');
    Route::post('/courses/{course}/add/{test}', [CourseController::class, 'addTestToCourse'])->name('addTestToCourse');
    Route::get('courses/{course}/add/lessons', [LessonController::class, 'getMyLessons'])->name('lessonsListForAddToCourse');
    Route::post('/courses/{course}/{lesson}', [CourseController::class, 'addLessonToCourse'])->name('addLessonToCourse');

    Route::get('/tests', [TestController::class, 'getMyTests'])->name('getMyTests');
    Route::view('/tests/constructor', 'tests.test-constructor')->name('testConstructor');
    Route::get('/tests/{test}/constructor', [TestController::class, 'changeTest'])->name('changeTest');
    Route::post('/tests/create', [TestController::class, 'createTest'])->name('createTest');
    Route::post('/tests/save', [TestController::class, 'saveTest'])->name('saveTest');
    Route::get('/test', [TestController::class, 'test'])->name('test');
    Route::get('/tests/delete/{test}', [TestController::class, 'deleteTest'])->name('deleteTest');
    Route::get('/tests/{test}', [TestController::class, 'getTest'])->name('getTest');
    Route::post('/tests/{test}/complete', [TestController::class, 'completeTest'])->name('completeTest');

    Route::get('/lessons', [LessonController::class, 'getMyLessons'])->name('getMyLessons');
    Route::get('/lessons/{lesson}', [LessonController::class, 'getLesson'])->name('getLesson');
    Route::get('/lesson/constructor', [LessonController::class, 'getLessonConstructor'])->name('newLessonConstructor');
    Route::get('/lessons/{lesson}/constructor', [LessonController::class, 'getLessonConstructor'])->name('changeLessonConstructor');
    Route::post('/lessons/create', [LessonController::class, 'createLesson'])->name('createLesson');
    Route::post('/lessons/update/{lesson}', [LessonController::class, 'changeLesson'])->name('changeLesson');
    Route::post('/lessons/delete/{lesson}', [LessonController::class, 'deleteLesson'])->name('deleteLesson');

    Route::get('/performance', [UserController::class, 'getUserPerformance'])->name('performance');
});

Route::middleware('guest')->group(function () {
    Route::view('/register', 'user.register')->name('register');
    Route::post('/register', [UserController::class, 'registerUser'])->name('register');
    Route::view('/login', 'user.login')->name('login');
    Route::post('/login', [UserController::class, 'loginUser'])->name('login');
});
