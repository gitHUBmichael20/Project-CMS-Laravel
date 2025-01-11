<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\RedirectIfNotAuthenticatedAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('section.about');
})->name('about');

Route::get('/browse', [articleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('browse');

Route::get('/articles/{id}', [ArticleController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('articles.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Halaman login admin
    Route::get('/login-admin', [AdminController::class, 'showLoginForm'])->name('login-admin');
    Route::post('/login-admin', [AdminController::class, 'login-admin'])->name("login-admin");

    // Halaman registrasi admin
    Route::get('/register-admin', [AdminController::class, 'showRegistrationForm'])->name('register-admin');
    Route::post('/register-admin', [AdminController::class, 'register'])->name("register-admin");

    // Logout
    Route::post('/logout-admin', [AdminController::class, 'logout'])->name('logout-admin');

    // Halaman dashboard admin setelah login
    Route::middleware([RedirectIfNotAuthenticatedAdmin::class])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    
        Route::get('/dashboard', [ArticleController::class, 'managePost'])->name('admin.admin-manage');
    });
});

Route::post('/articles', [articleController::class, 'store']);
Route::put('/articles/{id}', [articleController::class, 'update']);
Route::delete('/articles/{id}', [articleController::class, 'destroy']);

require __DIR__ . '/auth.php';
