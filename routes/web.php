<?php
include_once 'auth.php';

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadTemporaryImageController;
use App\Http\Controllers\DeleteTemporaryImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageContentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


//USER ROOTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::post('/send/review/{id}', [ReviewController::class, 'store'])->name('review.store');



// ADMIN ROUTE
Route::get('/admin/index', function() {
    $totalProducts = Product::count();
    $totalProductsInStock = Product::where('stock_status', 'instock')->count();
    $totalProductsOutStock = Product::where('stock_status', 'outstock')->count();
    $totalProductsLowStock = Product::where('quantity', '<', '10')->count();
    $orders = Order::latest()->take(5)->get();

    // Get the most ordered products with their details and customers who ordered them
    $mostOrderedProducts = DB::table('order_items')
        ->select('order_items.product_id', DB::raw('count(*) as order_count'), 'products.name', 'products.price')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->groupBy('order_items.product_id', 'products.name', 'products.price')
        ->orderBy('order_count', 'desc')
        ->get();

    // Fetching customers for each product
    foreach ($mostOrderedProducts as $product) {
        $product->customers = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('order_items.product_id', $product->product_id)
            ->select('users.*')
            ->get();
    }

    // Calculate monthly sales
    $monthlySales = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthlySales[] = [
            'month' => Carbon::create()->month($month)->format('M'),
            'sales' => Order::where('status', 'validée')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count(),
        ];
    }

    // Calculate total revenue from all orders
    $totalRevenue = Order::sum('total_price');

    return view('admin.index', compact(
        'totalProducts',
        'totalProductsInStock',
        'totalProductsOutStock',
        'totalProductsLowStock',
        'orders',
        'monthlySales',
        'mostOrderedProducts',
        'totalRevenue'
    ));
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

//admin orders
Route::get('/admin/orders/index', [OrderController::class, 'getOrders'])->middleware('auth', 'isAdmin')->name('admin.orders.index');
Route::get('/admin/order/show/{id}', [OrderController::class, 'showOrder'])->middleware('auth', 'isAdmin')->name('admin.orders.show');
Route::get('/admin/order/validate/{id}', [OrderController::class, 'validate'])->middleware('auth', 'isAdmin')->name('admin.orders.validate');
Route::get('/admin/order/cancel/{id}', [OrderController::class, 'cancel'])->middleware('auth', 'isAdmin')->name('admin.orders.cancel');
Route::delete('/admin/order/delete/{id}', [OrderController::class, 'delete'])->middleware('auth', 'isAdmin')->name('admin.orders.delete');
Route::get('/admin/order/payments/cancel/{id}', [OrderController::class, 'cancelPayment'])->middleware('auth', 'isAdmin')->name('admin.payments.cancel');
Route::get('/admin/order/payments/validate/{id}', [OrderController::class, 'validatePayment'])->middleware('auth', 'isAdmin')->name('admin.payments.validate');
Route::get('/admin/order/payments/rembourser/{id}', [OrderController::class, 'rembourser'])->middleware('auth', 'isAdmin')->name('admin.payments.rembourser');


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


//cart
Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('/removeItemFromCart/{id}', [CartController::class, 'removeItemFromCart'])->name('removeItemFromCart');

//cart page
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/addQuantity/{id}', [CartController::class, 'addQuantity'])->name('cart.addQuantity');
Route::get('/decreaseQuantity/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decreaseQuantity');

//checkout page
Route::get('/checkout', [CheckoutController::class, 'checkoutPage'])->name('checkout.page');
Route::get('/order-completed', [CheckoutController::class, 'orderCompleted'])->name('order.completed');

//orders
Route::post('/create/order', [OrderController::class, 'createOrder'])->name('order.create');

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
