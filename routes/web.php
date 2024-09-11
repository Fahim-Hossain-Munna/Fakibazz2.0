<?php

use App\Http\Controllers\{FrontendController, HomeController, ProfileController};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[FrontendController::class , 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/username/update', [ProfileController::class, 'name_update'])->name('profile.username');
Route::post('/profile/email/update', [ProfileController::class, 'email_update'])->name('profile.email');
Route::post('/profile/password/update', [ProfileController::class, 'password_update'])->name('profile.password');
Route::post('/profile/image/update', [ProfileController::class, 'image_update'])->name('profile.image');
