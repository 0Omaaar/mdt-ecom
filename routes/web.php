<?php
include_once 'auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadTemporaryImageController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Models\Product;

//USER ROOTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::post('/send/review/{id}', [ReviewController::class, 'store'])->name('review.store');



//ADMIN ROUTES
Route::get('/admin/index', function() {
    $totalProducts = Product::count();
    $totalProductsInStock = Product::where('stock_status', 'instock')->count();
    $totalProductsOutStock = Product::where('stock_status', 'outstock')->count();
    $totalProductsLowStock = Product::where('quantity', '<', '10')->count();

    return view('admin.index', compact('totalProducts', 'totalProductsInStock', 'totalProductsOutStock', 'totalProductsLowStock'));
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


//files upload
Route::post('/upload', [UploadTemporaryImageController::class, 'upload'])->name('upload');
Route::delete('/delete', [DeleteTemporaryImageController::class, 'delete'])->name('delete');

//products
Route::get('/admin/products/index', [ProductController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.products.index');
Route::get('/admin/product/{id}', [ProductController::class, 'show'])->middleware('auth', 'isAdmin')->name('admin.products.show');
Route::get('/admin/products/create', [ProductController::class, 'create'])->middleware('auth', 'isAdmin')->name('admin.products.create');
Route::post('/admin/products/store', [ProductController::class, 'store'])->middleware('auth', 'isAdmin')->name('admin.products.store');
Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->middleware('auth', 'isAdmin')->name('admin.products.update');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('admin.products.destroy');
