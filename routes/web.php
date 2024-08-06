<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\CommentController;

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class,'detail']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('articles/delete/{id}', [ArticleController::class,'delete']);

Route::get('/articles/add', [ArticleController::class,'add']);
Route::post('/articles/add', [ArticleController::class,'create']);
Route::get('/articles/edit/{id}', [ArticleController::class,'edit']);
Route::post('/articles/edit/{id}', [ArticleController::class,'update']);

Route::post('/comments/add', [CommentController::class, 'create'] );
Route::get('/comments/delete/{id}', [CommentController::class,'delete']);
   


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

Route::get('/', [ArticleController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

