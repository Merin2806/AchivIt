<?php

use App\Http\Controllers\ProfileController;
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
    Route::get('/achievements/submit', function () {
        return view('student.submit');
    })->name('student.submit');

    Route::get('/achievements/history', function () {
        return view('student.history');
    })->name('student.history');
});

// Faculty Portal frontend routes
Route::get('/faculty/login', function () {
    return view('faculty.login');
})->name('faculty.login');

Route::get('/faculty/dashboard', function () {
    return view('faculty.dashboard');
})->name('faculty.dashboard');

Route::get('/faculty/review', function () {
    return view('faculty.review');
})->name('faculty.review');

require __DIR__.'/auth.php';
