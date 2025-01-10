<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/articles', function () {
    return view('section.articles');
})->name('articles');

Route::get('/browse', [articleController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('browse');

// Route::get('/articles/{id}', [articleController::class, 'show'])
//     ->middleware(['auth', 'verified'])
//     ->name('read');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/articles', [articleController::class, 'store']);
// Route::get('/articles/{id}', [articleController::class, 'show']);
Route::put('/articles/{id}', [articleController::class, 'update']);
Route::delete('/articles/{id}', [articleController::class, 'destroy']);

require __DIR__ . '/auth.php';
