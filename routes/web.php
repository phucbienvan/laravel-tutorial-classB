<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/{id}', [UserController::class, 'show']);

// Route::group(['prefix' => '/users'], function () {
//     Route::get('', [UserController::class, 'index']);
//     Route::get('/{id}', [UserController::class, 'show']);
// });

Route::group(['prefix' => '/posts'], function () {
    Route::post('', [PostController::class, 'store']);
    Route::get('', [PostController::class, 'index'])->name('index.posts');
    Route::get('create', [PostController::class, 'create'])->name('create.posts');
    Route::post('insert', [PostController::class, 'insert'])->name('insert.posts');
    Route::get('/{post}', [PostController::class, 'show'])->name('show.posts');
    Route::get('edit/{post}', [PostController::class, 'edit'])->name('edit.posts');
    Route::post('update/{post}', [PostController::class, 'update'])->name('update.posts');
    Route::get('delete-post/{post}', [PostController::class, 'delete'])->name('delete.posts');
});


