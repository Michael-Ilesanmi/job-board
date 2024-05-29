<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
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
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/register', [AuthController::class, 'store'])->name('register');

// GoogleAuthController redirect and callback urls
Route::get('/login/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// FacebookAuthController redirect and callback urls
Route::get('/login/facebook', [FacebookAuthController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/login/facebook/callback', [FacebookAuthController::class, 'handleFacebookCallback']);

Route::get('/', [JobsController::class, 'index'])->name('jobs.index');
Route::get('/jobs', [JobsController::class, 'all'])->name('jobs.all');
Route::get('/job/{slug}', [JobsController::class, 'job'])->name('jobs.show');




Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

