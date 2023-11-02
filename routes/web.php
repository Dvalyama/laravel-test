<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');

Route::redirect('/home','/');

Route::get('/test', TestController::class);


Route::get('register',[RegisterController::class, 'index'])->name('register ');
Route::post('register',[RegisterController::class, 'store'])->name('register.store ');

Route::get('login',[LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class, 'store'])->name('login.store');

Route::get('blog', [BlogController::class,'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class,'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class,'like'])->name('blog.like');

//страницы
Route::prefix('user')->group(function () {
    Route::get ('posts',[PostController::class, 'index'])->name('user.posts');
    Route::get ('posts/create',[PostController::class, 'create'])->name('user.posts.create');
    Route::post ('posts',[PostController::class, 'store'])->name('user.posts.store');
    Route::get ('posts/{post}',[PostController::class, 'show'])->name('user.posts.show');
    Route::get ('posts/{post}/edit',[PostController::class, 'edit'])->name('user.posts.edit');
    Route::put ('posts/{post}',[PostController::class, 'update'])->name('user.posts.update');
    Route::delete ('posts/{post}',[PostController::class, 'delete'])->name('user.posts.delete');
    Route::put ('posts/{post}/like',[PostController::class, 'like'])->name('user.posts.like');
    });

Route::prefix('admin')->group(function () {
    Route::get ('posts',[PostController::class, 'index'])->name('admin.posts');
    Route::get ('posts/create',[PostController::class, 'create'])->name('admin.posts.create');
    Route::post ('posts',[PostController::class, 'store'])->name('admin.posts.store');
    Route::get ('posts/{post}',[PostController::class, 'show'])->name('admin.posts.show');
    Route::get ('posts/{post}/edit',[PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put ('posts/{post}',[PostController::class, 'update'])->name('admin.posts.update');
    Route::delete ('posts/{post}',[PostController::class, 'delete'])->name('admin.posts.delete');
    Route::put ('posts/{post}/like',[PostController::class, 'like'])->name('admin.posts.like');
    });

   