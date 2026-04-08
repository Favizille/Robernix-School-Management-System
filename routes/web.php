<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [StudentController::class, 'viewHome'])->name('home');
Route::get('/login', [StudentController::class, 'viewLogin'])->name('login');
Route::get('/contact', [StudentController::class, 'viewContact'])->name('contact');

// Route::middleware(['auth'])->group(function () {

    // Teacher Routes
    Route::get('/teacher/scores/create', [ScoreController::class, 'create'])->name('scores.create');
    Route::post('/teacher/scores', [ScoreController::class, 'store'])->name('scores.store');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/results', [ResultController::class, 'index'])->name('results');
        Route::post('/results/positions', [ResultController::class, 'generatePositions'])->name('results.positions');
        Route::post('/results/publish', [ResultController::class, 'togglePublish'])->name('results.publish');
        Route::get('/results/export', [ResultController::class, 'export'])->name('results.export');
        Route::get('/register', [AdminController::class, 'viewRegister'])->name('register');
    });

    // Student Routes
    Route::get('/my-results', [StudentResultController::class, 'show'])->name('student.results');
// });