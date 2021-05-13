<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ThreadPostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


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
require __DIR__.'/auth.php';
