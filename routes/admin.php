<?php


use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SeasonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookingController;

Route::resource('post', PostController::class);
Route::resource('season', SeasonController::class);
Route::resource('booking', BookingController::class);
Route::middleware('optimizeImages')->group(function () {
    Route::post('post.store', [PostController::class, 'store']);
});

Route::get('/calendar', function () {
    return view('admin.calendar.calendar');
});

Route::resource('category', CategoryController::class);
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('admin.category.show');
