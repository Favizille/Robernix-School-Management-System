<?php

use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [StudentController::class, 'viewHome'])->name('home');

// Route::middleware(['auth'])->group(function () {

    // Teacher Routes
    Route::get('/admin/dashboard', [ScoreController::class, 'viewDashboard'])->name('dashboard.view');
    Route::get('/teacher/scores/create', [ScoreController::class, 'create'])->name('scores.create');
    Route::post('/teacher/scores', [ScoreController::class, 'store'])->name('scores.store');

    // Admin Routes
    // In a real app, add middleware like 'role:admin'
    Route::get('/admin/results', [ResultController::class, 'index'])->name('admin.results');
    Route::post('/admin/results/positions', [ResultController::class, 'generatePositions'])->name('admin.results.positions');
    Route::post('/admin/results/publish', [ResultController::class, 'togglePublish'])->name('admin.results.publish');
    Route::get('/admin/results/export', [ResultController::class, 'export'])->name('admin.results.export');

    // Student Routes
    Route::get('/my-results', [StudentResultController::class, 'show'])->name('student.results');
// });