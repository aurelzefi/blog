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

Route::get('/', PostsController::class)->name('posts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/user/posts', [UserPostsController::class, 'index'])->name('user.posts.index');
Route::get('/user/posts/create', [UserPostsController::class, 'create'])->name('user.posts.create');
Route::post('/user/posts', [UserPostsController::class, 'store'])->name('user.posts.store');
