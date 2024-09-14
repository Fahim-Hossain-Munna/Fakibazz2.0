<?php

use App\Http\Controllers\{CategoryController, FrontendController, HomeController, ProfileController};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[FrontendController::class , 'index']);


Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/username/update', [ProfileController::class, 'name_update'])->name('profile.username');
Route::post('/profile/email/update', [ProfileController::class, 'email_update'])->name('profile.email');
Route::post('/profile/password/update', [ProfileController::class, 'password_update'])->name('profile.password');
Route::post('/profile/image/update', [ProfileController::class, 'image_update'])->name('profile.image');

// category

Route::get('/category',[CategoryController::class,'index'])->name('kallu.mama');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{slug}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{slug}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/destroy/{slug}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/category/status/{id}',[CategoryController::class,'status'])->name('category.status');

