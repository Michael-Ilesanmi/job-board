<?php

use App\Http\Controllers\Auth\AuthController;
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
Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/', [JobsController::class, 'index'])->name('jobs.index');
Route::get('/jobs', [JobsController::class, 'all'])->name('jobs.all');
Route::get('/{slug}', [JobsController::class, 'job'])->name('jobs.show');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

