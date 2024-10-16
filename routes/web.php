<?php
include_once 'auth.php';

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadTemporaryImageController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageContentController;
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


//reviews
Route::get('/admin/reviews/index', [ReviewController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.reviews.index');
Route::delete('/admin/reviews/delete/{id}', [ReviewController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('admin.reviews.destroy');
Route::post('/admin/review/answer/mail/{id}', [ReviewController::class, 'answerReviewWithMail'])->middleware('auth', 'isAdmin')->name('admin.reviews.answer');


//brands
Route::get('/admin/brands/index', [BrandController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.brands.index');
Route::post('/admin/brands/store', [BrandController::class, 'store'])->middleware('auth', 'isAdmin')->name('admin.brands.store');
Route::put('/admin/brands/update/{id}', [BrandController::class, 'update'])->middleware('auth', 'isAdmin')->name('admin.brands.update');
Route::delete('/admin/brands/delete/{id}', [BrandController::class, 'destroy'])->middleware('auth', 'isAdmin')->name('admin.brands.destroy');


//manage content
Route::get('/admin/manage/content/index', [ManageContentController::class, 'index'])->middleware('auth', 'isAdmin')->name('admin.content.index');
    //sliders
    Route::get('/admin/manage/content/sliders', [ManageContentController::class, 'sliders'])->middleware('auth', 'isAdmin')->name('admin.content.sliders');
    Route::post('/slider1/upload', [ManageContentController::class, 'uploadS1'])->name('slider1.upload');
    Route::delete('/slider1/delete', [ManageContentController::class, 'deleteS1'])->name('slider1.delete');
    Route::post('/slider2/upload', [ManageContentController::class, 'uploadS2'])->name('slider2.upload');
    Route::delete('/slider2/delete', [ManageContentController::class, 'deleteS2'])->name('slider2.delete');
    Route::post('/slider3/upload', [ManageContentController::class, 'uploadS3'])->name('slider3.upload');
    Route::delete('/slider3/delete', [ManageContentController::class, 'deleteS3'])->name('slider3.delete');


    //offers
    Route::get('/admin/manage/content/offer1', [ManageContentController::class, 'offer1'])->middleware('auth', 'isAdmin')->name('admin.content.offer1');
    Route::get('/admin/manage/content/offer2', [ManageContentController::class, 'offer2'])->middleware('auth', 'isAdmin')->name('admin.content.offer2');
    Route::post('/offer1/upload', [ManageContentController::class, 'uploadOffre1'])->name('offre1.upload');
    Route::delete('/offer1/delete', [ManageContentController::class, 'deleteOffre1'])->name('offre1.delete');
    Route::post('/offer2/upload', [ManageContentController::class, 'uploadOffre2'])->name('offre2.upload');
    Route::delete('/offer2/delete', [ManageContentController::class, 'deleteOffre2'])->name('offre2.delete');


    //day deals
    Route::get('/admin/manage/content/dayDeals', [ManageContentController::class, 'dayDealsProducts'])->middleware('auth', 'isAdmin')->name('admin.content.dayDeals');
    Route::post('/offer1/upload', [ManageContentController::class, 'uploadOffre1'])->name('offre1.upload');
    Route::delete('/offer1/delete', [ManageContentController::class, 'deleteOffre1'])->name('offre1.delete');
