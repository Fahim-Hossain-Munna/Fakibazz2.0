<?php

use App\Http\Controllers\{FrontendController, HomeController, ProfileController};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[FrontendController::class , 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/username/update', [ProfileController::class, 'name_update'])->name('profile.username');
