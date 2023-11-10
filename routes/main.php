<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::redirect('/home', '/');
Route::get('/test', TestController::class);


Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('blog', [\App\Http\Controllers\User\BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [\App\Http\Controllers\User\BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [\App\Http\Controllers\User\BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class);



   
