<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\ProfileController;

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

require __DIR__ . '/auth.php';
