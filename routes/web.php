<?php

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

Route::resource('post', 'PostController');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);
Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/posts/edit{id}', [App\Http\Controllers\PostController::class, 'show']);
Route::post('/posts/update{id}', [App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/hapus{id}', [App\Http\Controllers\PostController::class, 'destroy']);
