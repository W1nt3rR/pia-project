<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;

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

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/password', function () {
    return view('password-reset');
})->name('password-reset');

// News routes
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{news}', [NewsController::class, 'show']);

// Course routes
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show']);


// User routes
Route::post("/user/register", [UserController::class, "register"]);
Route::post("/user/login", [UserController::class, "login"]);
Route::post("/user/passwordreset", [UserController::class, "passwordreset"]);


// Authenticated routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Course routes
    Route::get('/course/create', [CourseController::class, 'create']);
    Route::post('/courses', [CourseController::class, 'store']);

    Route::get('/enrolled', [CourseController::class, 'enrolled']);

    Route::get('/course/enroll/{course}', [CourseController::class, 'enroll']);
    Route::get('/course/leave/{course}', [CourseController::class, 'leave']);

    Route::get('/course/delete/{course}', [CourseController::class, 'delete']);

    Route::get('/quiz/{quiz}', [QuizController::class, 'show']);
    Route::get('/quiz/create/{course}', [QuizController::class, 'create']);
    Route::get('/quiz/remove/{course}', [QuizController::class, 'remove']);
    Route::get('/quiz/start/{quiz}/{difficulty}', [QuizController::class, 'start']);

    Route::post('/questions/create/{quiz}', [QuizController::class, 'addQuestion']);
    Route::get('/questions/delete/{quiz}/{questionID}', [QuizController::class, 'removeQuestion']);

    Route::post('/questions/check', [QuizController::class, 'checkAnswers']);
    Route::get('/questions/result', [QuizController::class, 'results']);

    // News routes
    Route::post('/news', [NewsController::class, 'create']);

    Route::post('/course/pdf', [CourseController::class, 'uploadPDF']);
    Route::get('/documents/{course}/{filename}', [CourseController::class, 'showFile']);

    Route::get('/logout', [UserController::class, 'logout']);
});

// Admin only routes
Route::middleware(['auth:sanctum', 'auth.admin'])->group(function () {
});
