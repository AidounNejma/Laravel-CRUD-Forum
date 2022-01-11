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
/* Routes pour la gestion des posts */
Route::get('/liste-des-posts', [PostController::class, 'viewPostsAdmin'])->middleware('admin')->name('all-posts');
Route::post('/liste-des-posts/{id}', [PostController::class, 'destroyPost'])->middleware('admin')->name('destroy.post');

Route::get('/ajouter-un-post', [PostController::class, 'create'])->middleware('admin')->name('add-post');
Route::post('/ajouter-un-post', [PostController::class, 'addPosts'])->middleware('admin')->name('submit.post');

Route::get('/modifier-un-post/{id}', [PostController::class, 'editPost'])->middleware('admin')->name('edit-one-post');
Route::post('/modifier-un-post/{id}', [PostController::class, 'submitEdit'])->middleware('admin')->name('submit.edit');

Route::get('/tous-les-posts', [PostController::class, 'show'])->middleware(['auth'])->name('show-posts');
Route::get('/tous-les-posts/{id}', [PostController::class, 'showOnePost'])->middleware(['auth'])->name('show.one.post');


/* -------------------------------------------------------------- */
/* Routes pour la gestion des utilisateurs */
Route::get('/liste-des-utilisateurs', [UserController::class, 'displayUsersAdmin'])->middleware('admin')->name('all-users');
Route::post('/liste-des-utilisateurs/{id}', [UserController::class, 'destroyUser'])->middleware('admin')->name('destroy.user');


Route::get('/ajouter-un-utlisateur', [UserController::class, 'create'])->middleware('admin')->name('add-user');
Route::post('/ajouter-un-utlisateur', [UserController::class, 'addUser'])->middleware('admin')->name('submit.user');

Route::get('/modifier-un-utilisateur/{id}', [UserController::class, 'editUser'])->middleware('admin')->name('edit-one-user');
Route::post('/modifier-un-utilisateur/{id}', [UserController::class, 'submitEdit'])->middleware('admin')->name('submit.edit.user');

/* -------------------------------------------------------------- */
/* Routes pour commenter */
Route::post('/tous-les-posts/{id}', [CommentController::class, 'addComment'])->middleware(['auth'])->name('add-comment');
Route::get('/supprimer-un-commentaire/{id}', [CommentController::class, 'destroyComment'])->middleware('admin')->name('destroy.comment');

/* -------------------------------------------------------------- */
/* Routes pour la l'édition du profil */
Route::get('/editer-mon-profil/', [UserController::class, 'editProfile'])->middleware(['auth'])->name('edit-profile');
Route::post('/editer-mon-profil/', [UserController::class, 'submitEditProfile'])->name('submit-edit-profile');


require __DIR__.'/auth.php';
