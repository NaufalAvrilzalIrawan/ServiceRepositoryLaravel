<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/posts/edit{id}', [PostController::class, 'show']);
Route::post('/posts/update{id}', [PostController::class, 'update']);
Route::get('/posts/hapus{id}', [PostController::class, 'destroy']);
