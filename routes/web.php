<?php
include_once 'auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('user.home');
});


//ADMIN ROUTES
Route::get('/admin/index', function() {
    return view('admin.index');
})->middleware('isAdmin')->name('admin.index');
Route::get('/admin/categories/index', [CategoryController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.categories.index');
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->middleware('auth', 'isAdmin')->name('admin.categories.store');
