<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard-admin', function () {
    return view('admin/home_admin');
})->middleware(['auth'])->name('dashboard_admin');

Route::get('/ajouter-un-post', [PostController::class, 'create'])->name('add-post');
Route::post('/ajouter-un-post', [PostController::class, 'addPosts'])->name('submit.post');

Route::get('/tous-les-posts', [PostController::class, 'show'])->name('show-posts');
Route::get('/tous-les-posts/{id}', [PostController::class, 'showOnePost'])->name('show.one.post');

Route::get('/modifier-un-post/{id}', [PostController::class, 'editPost'])->name('edit-one-post');
Route::post('/modifier-un-post/{id}', [PostController::class, 'submitEdit'])->name('submit.edit');

Route::get('/liste-des-posts', [PostController::class, 'viewPostsAdmin'])->name('all-posts');
Route::get('/liste-des-utilisateurs', [UserController::class, 'displayUsersAdmin'])->name('all-users');

require __DIR__.'/auth.php';
