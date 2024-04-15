<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\CheckRolePermission;

Route::view('/', 'home.index')->name('home');
Route::redirect('/home', '/')->name('home.redirect');

Route::get('/test', TestController::class)->name('test');

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');
});

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class)->only([
    'index', 'show',
]);

Route::middleware('auth')->group(function () {
    Route::get('user/posts', [PostController::class, 'index'])->name('user.posts.index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/access-denied', function () {
    return view('errors.access_denied');
})->name('access.denied');

