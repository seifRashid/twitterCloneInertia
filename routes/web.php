<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Tweeter app routes
Route::get('/home',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

//Idea posts routes
Route::resource('tweet', IdeasController::class)
    ->only(['store'])
    ->middleware(['auth', 'verified']);

//route view for terms page
Route::get('/terms', function () {
    return Inertia::render('Chat/VTerms');
    })->name('terms');




require __DIR__.'/auth.php';
