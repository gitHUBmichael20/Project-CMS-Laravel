<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\RedirectIfNotAuthenticatedAdmin;
use App\Http\Controllers\articleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin')->name('admin.')->group(function () {
    // Halaman login admin
    Route::get('/login-admin', [AdminController::class, 'showLoginForm'])->name('login-admin');
    Route::post('/login-admin', [AdminController::class, 'login'])->name("login-admin");

    // Halaman registrasi admin
    Route::get('/register-admin', [AdminController::class, 'showRegistrationForm'])->name('register-admin');
    Route::post('/register-admin', [AdminController::class, 'register'])->name("register-admin");

    // Logout
    Route::post('/logout-admin', [AdminController::class, 'logout'])->name('logout-admin');

    // CRUD
    Route::post('/upload-image', [articleController::class, 'store'])->name('upload-image');
    Route::patch('/articles/update', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/delete/{id}', [ArticleController::class, 'destroy'])->name('articles.delete');

    // Halaman dashboard admin setelah login
    Route::middleware([RedirectIfNotAuthenticatedAdmin::class])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/dashboard', [ArticleController::class, 'managePost'])->name('admin.admin-manage');
    });
});