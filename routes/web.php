<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', [JobController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.index');

Route::get('/jobs/create', [JobController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.create');

Route::post('/jobs', [JobController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.store');

Route::get('/jobs/{job}', [JobController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.show');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('jobs.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
