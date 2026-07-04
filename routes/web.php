<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AchievementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Student Achievement Submission and History
    Route::get('/achievements/create', [AchievementController::class, 'create'])->name('student.submit');
    Route::post('/achievements', [AchievementController::class, 'store'])->name('achievements.store');
    Route::get('/achievements', [AchievementController::class, 'index'])->name('student.history');

    // Faculty Portal routes (protected by auth middleware)
    Route::group(['prefix' => 'faculty', 'as' => 'faculty.'], function () {
        Route::get('/dashboard', [FacultyController::class, 'dashboard'])->name('dashboard');

        Route::get('/review', [FacultyController::class, 'review'])->name('review');
        Route::post('/review/{id}', [FacultyController::class, 'processReview'])->name('review.submit');
    });
});

// Faculty Portal login (guest only)
Route::get('/faculty/login', function () {
    return view('faculty.login');
})->middleware('guest')->name('faculty.login');

require __DIR__.'/auth.php';
