<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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

/* -------------------------------------------------------------- */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/* -------------------------------------------------------------- */

Route::get('/liste-des-posts', [PostController::class, 'viewPostsAdmin'])->name('all-posts');
Route::post('/liste-des-posts/{id}', [PostController::class, 'destroyPost'])->name('destroy.post');

Route::get('/ajouter-un-post', [PostController::class, 'create'])->name('add-post');
Route::post('/ajouter-un-post', [PostController::class, 'addPosts'])->name('submit.post');

Route::get('/modifier-un-post/{id}', [PostController::class, 'editPost'])->name('edit-one-post');
Route::post('/modifier-un-post/{id}', [PostController::class, 'submitEdit'])->name('submit.edit');

Route::get('/tous-les-posts', [PostController::class, 'show'])->name('show-posts');
Route::get('/tous-les-posts/{id}', [PostController::class, 'showOnePost'])->name('show.one.post');


/* -------------------------------------------------------------- */

Route::get('/liste-des-utilisateurs', [UserController::class, 'displayUsersAdmin'])->name('all-users');
Route::post('/liste-des-utilisateurs/{id}', [UserController::class, 'destroyUser'])->name('destroy.user');


Route::get('/ajouter-un-utlisateur', [UserController::class, 'create'])->name('add-user');
Route::post('/ajouter-un-utlisateur', [UserController::class, 'addUser'])->name('submit.user');

Route::get('/modifier-un-utilisateur/{id}', [UserController::class, 'editUser'])->name('edit-one-user');
Route::post('/modifier-un-utilisateur/{id}', [UserController::class, 'submitEdit'])->name('submit.edit.user');

/* -------------------------------------------------------------- */

Route::post('/tous-les-posts/{id}', [CommentController::class, 'addComment'])->name('add-comment');
Route::get('/supprimer-un-commentaire/{id}', [CommentController::class, 'destroyComment'])->name('destroy.comment');

/* -------------------------------------------------------------- */
Route::get('/editer-mon-profil/', [UserController::class, 'editProfile'])->name('edit-profile');
Route::post('/editer-mon-profil/', [UserController::class, 'submitEditProfile'])->name('submit-edit-profile');


require __DIR__.'/auth.php';
