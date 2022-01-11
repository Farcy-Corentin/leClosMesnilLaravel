<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EquipmentCategoryController;

Route::resource('hotel', hotelController::class);
Route::resource('equipment', EquipmentController::class);
Route::resource('equipmentCategory', EquipmentCategoryController::class);
Route::resource('post', PostController::class);
Route::resource('season', SeasonController::class);
Route::middleware('optimizeImages')->group(function () {
    // all images will be optimized automatically
    Route::post('post.store', 'PostController@store');
});

Route::get('/calendar', function () {
    return view('admin.calendar.calendar');
});

Route::resource('category', CategoryController::class);
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::get('/category/{slug}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
