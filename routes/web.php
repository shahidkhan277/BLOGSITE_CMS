<?php

use App\Http\Controllers\Auth\Posts\CategoryController as PostsCategoryController;
use App\Http\Controllers\Auth\Posts\DashboardController;
use App\Http\Controllers\Auth\Posts\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\site\CommentController;
use App\Http\Controllers\Site\CommentsController;
use App\Models\Category;
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

Route::get('/admin', function () {
    return view('layouts.auth');
});

Route::get('/' , [BlogController::class , 'index'])->name('site');

Route::get('single-blog/{id}', [BlogController::class, 'singleblog'])->name('single-blog');
Route::get('single-category/{id}', [BlogController::class , 'categories'])->name('single-category');
Route::post('post/comment/{postId}', [CommentsController::class, 'postcomment'])->name('postcomment')->middleware('auth');
Route::post('comment/reply/{commentid}', [CommentsController::class, 'commentreply'])->name('commentreply')->middleware('auth');


Route::get('/logout', function () {
    auth()->logout();
    return to_route('login');
});


Auth::routes();





Route::middleware('auth','user-acesse:admin')->group(function (){
    
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('auth/posts', PostController::class);
    Route::get('add_category' , [PostsCategoryController::class,'index'])->name('add_category');
    Route::post('category_store' , [PostsCategoryController::class,'store'])->name('category_store');
    Route::delete('category_destroy/{id}' , [PostsCategoryController::class,'destroy'])->name('category_destroy');
    Route::get('auth/comments', [CommentsController::class, 'showcomment'])->name('showcomments');
    Route::delete('comment_destroy/{id}', [CommentsController::class, 'commentdestroy'])->name('comment_destroy');
    Route::delete('reply_destroy/{id}', [CommentsController::class, 'replydestroy'])->name('reply_destroy');
    Route::get('/approvecomment/{id}', [CommentsController::class, 'approvecomment'])->name('comment-approve');
    Route::get('/declinecomment/{id}', [CommentsController::class, 'declinecomment'])->name('comment-decline');

});