<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThreadPostController;
use App\Http\Controllers\VoteController;

Route::get('/', [ThreadController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class,
    [
        'only' => ['create', 'store']
    ]
    )->parameters([
    'categories' => 'categories'
]);

Route::resource('threads', ThreadController::class,
    [
        'only' => ['index', 'create', 'store','show']
    ])->parameters([
    'threads' => 'threads'
]);

Route::resource('thread-post', ThreadPostController::class,
    [
        'only' => ['store']
    ])->parameters([
    'post' => 'post'
]);

Route::post('/vote/{threadPost}', [VoteController::class, 'index'])->name('vote-on-post')->middleware('auth');

require __DIR__.'/auth.php';

