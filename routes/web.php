<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileDataController;
use App\Http\Controllers\ProfilePageController;
use App\Models\ProfileData;
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
Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

//Idea posts routes
Route::resource('tweet', IdeasController::class)
    ->only(['store', 'destroy', 'show', 'edit','update'])
    ->names(['store' => 'tweet.store', 'destroy' => 'tweet.destroy', 'show' => 'tweet.show', 'edit' => 'tweet.edit', 'update'=>'tweet.update'])
    ->middleware(['auth', 'verified']);

//Comment routes
Route::resource('comment', CommentController::class)
    ->only(['store'])
    ->names(['store' => 'tweet.comment.store'])
    ->middleware(['auth', 'verified']);
// Route::delete('/tweet/{id}', [IdeasController::class, 'destroy'])->name('tweet.destroy');

//route view for terms page
Route::get('/terms', function () {
    return Inertia::render('Chat/VTerms');
})->name('terms');


//Route for profile page
Route::resource('profile_data', ProfileDataController::class)
    ->only(['index', 'update'])
    ->names(['index'=>'profilepage.index', 'update'=>'profilePic.update'])
    ->middleware(['auth', 'verified']);

//Follow and unfollow routes
Route::post('users/{id}/follow', [FollowController::class, 'follow'])->name('user.follow')->middleware('auth');
Route::post('users/{id}/unfollow', [FollowController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');


require __DIR__ . '/auth.php';
