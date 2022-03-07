<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index'])->name('index');

//Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{slug}', [PostController::class, 'show'])->where('slug', '[\w\d\-\_]+')->name('post.show');
Route::get('/post/{slug}#comment', [PostController::class, 'show'])->where('slug', '[\w\d\-\_]+')->name('post.comment');

Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comment.store');
Route::patch('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::get('/booking', [BookingController::class, 'index'])->name('booking')->middleware('verified');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Auth::routes(['verify' => true]);
