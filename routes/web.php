<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);

    // Halaman registrasi admin
    Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AdminController::class, 'register']);

    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Halaman dashboard admin setelah login
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'Welcome to Admin Dashboard!';
        })->name('dashboard');
    });
});

Route::post('/articles', [articleController::class, 'store']);
Route::put('/articles/{id}', [articleController::class, 'update']);
Route::delete('/articles/{id}', [articleController::class, 'destroy']);

require __DIR__ . '/auth.php';
