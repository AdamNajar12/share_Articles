<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
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

Route::get('/articles', [ArticleController::class, 'showArticels'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addfront', [ArticleController::class, 'addFront'])->name('layouts.addFront');
Route::post('/front', [ArticleController::class, 'storeFront'])->name('layouts.storeFront');
Route::get('/show', [ArticleController::class, 'Front'])->name('layouts.frontend');