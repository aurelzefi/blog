<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\User\PostsController as UserPostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostsController::class, 'index'])->name('posts.index');

require __DIR__.'/auth.php';

Route::resource('posts', PostsController::class)
    ->only(['create', 'store'])
    ->middleware('auth');

Route::get('/user/posts', UserPostsController::class)
    ->name('user.posts.index')
    ->middleware('auth');
