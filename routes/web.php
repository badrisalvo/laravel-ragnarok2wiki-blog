<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleController;

Auth::routes();

// Rute yang dapat diakses tanpa autentikasi
Route::group(['middleware' => ['setlocale']], function () {
    Route::get('/', 'BlogController@index')->name('home');
    Route::get('/isi-post/{slug}', 'BlogController@isi')->name('blog.isi');
    Route::get('/list-post', 'BlogController@list_blog')->name('blog.list');
    Route::get('/list-category/{category}', 'BlogController@list_category')->name('blog.category');
    Route::get('/profile/{users}', 'BlogController@users')->name('blog.users');
    Route::get('/cari', 'BlogController@cari')->name('blog.cari');
    Route::get('/daftar-anggota', 'BlogController@foto')->name('user.foto');
    Route::get('/dashboard', 'BlogController@showDashboard')->name('dashboard');
    

    // Rute untuk reset password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Rute untuk halaman register
    Route::get('/register', [UserController::class, 'regis'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
    Route::get('/oauth/google/callback', 'GoogleController@handleGoogleCallback');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
});

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Rute yang memerlukan hak akses admin
    Route::middleware(['admin'])->group(function () {
        Route::resource('/category', 'CategoryController');
        Route::resource('/tag', 'TagController');
        Route::resource('/user', 'UserController');
        Route::post('/admin/generate-unique-code', [UserController::class, 'generateUniqueCode'])->name('admin.generateUniqueCode');
        Route::delete('/unique-codes/{id}', 'UserController@deleteUniqueCode')->name('admin.deleteUniqueCode');
        Route::patch('user/activate/{id}', 'UserController@activate')->name('user.activate');
        Route::get('/comment', [CommentController::class, 'index']);
        Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
        Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
        
    });
    Route::middleware(['checkActivation'])->group(function () {
        Route::get('/post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
        Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
        Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
        Route::post('/upload-image', 'ImageUploadController@upload')->name('image.upload');
        Route::resource('/post', 'PostController');
        Route::resource('/home', 'PostController');
        Route::patch('user/activate/{id}', 'UserController@activate')->name('user.activate');
        

    });
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::patch('user/activate/{id}', 'UserController@activate')
    ->name('user.activate')
    ->middleware('checkActivation', 'checkUserType:3');
    
});

    // Rute untuk PostController yang tidak memerlukan hak akses admin



