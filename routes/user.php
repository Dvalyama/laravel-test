<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::redirect('/', '/user/posts')->name('user');

    Route::group(['middleware' => ['permission:create posts']], function () {
        Route::get('posts', [PostController::class, 'create'])->name('user.posts.create');
        Route::get('posts/create', [PostController::class, 'index'])->name('user.posts');
        Route::post('comment/create', [CommentController::class, 'store'])->name('user.comment');
    });

    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('user.posts.like');

    Route::group(['middleware' => ['permission:delete any posts']], function () {
        Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete');
    });

    Route::delete('comment/{id}', [CommentController::class, 'destroy'])->name('user.comment.destroy');

    Route::get('donates', DonateController::class)->name('user.donates');
});

