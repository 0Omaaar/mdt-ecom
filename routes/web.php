<?php
include_once 'auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


Route::get('/', function () {
    return view('user.home');
});


//ADMIN ROUTES
Route::get('/admin/index', function() {
    return view('admin.index');
})->middleware('isAdmin')->name('admin.index');

//categories
Route::get('/admin/categories/index', [CategoryController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.categories.index');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->middleware('auth', 'isAdmin')->name('admin.categories.store');
Route::put('/admin/categories/update/{id}', [CategoryController::class, 'update'])->middleware('auth', 'isAdmin')->name('admin.categories.update');
Route::delete('/admin/categories/delete/{id}', [CategoryController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('admin.categories.destroy');

//sub categories
Route::get('/admin/subCategories/index', [SubCategoryController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.subCategories.index');
Route::post('/admin/subCategories/store', [SubCategoryController::class, 'store'])->middleware('auth', 'isAdmin')->name('admin.subCategories.store');
Route::put('/admin/subCategories/update/{id}', [SubCategoryController::class, 'update'])->middleware('auth', 'isAdmin')->name('admin.subCategories.update');
Route::delete('/admin/subCategories/delete/{id}', [SubCategoryController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('admin.subCategories.destroy');
