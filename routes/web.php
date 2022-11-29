<?php

use App\Enums\UserRoles;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();


Route::get('/', static function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Only can manage Admin and Manager
    Route::middleware(['role:' . UserRoles::only(['admin', 'manager'], true)])
        ->get('posts', [PostController::class, 'index'])->name('post.index');

    // Only can manage Admin
    Route::middleware(['role:' . UserRoles::only(['admin'], true)])
        ->delete('posts/{id}', [PostController::class, 'destroy'])->name('post.delete');

    Route::middleware(['role:' . UserRoles::only(['admin'], true)])
        ->get('posts-comments/{id}', [PostController::class, 'comments'])->name('post.comments');
});
