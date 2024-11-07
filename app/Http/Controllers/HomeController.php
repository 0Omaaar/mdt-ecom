<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use ComposerAutoloaderInit7e8c3c14ff33b199b4a0838993eb8423;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }

    public function index(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $dayDeals = Product::where('dayDeals', true)->get();
        $cart = $this->getUserCart();
        $randomProducts = Product::inRandomOrder()->take(8)->get();
        $offer1 = Setting::where('subject', 'offre1-produit-id')->first();
        $offer2 = Setting::where('subject', 'offre2-produit-id')->first();
        $slider1 = Setting::where('subject', 'content-slider-1')->first();
        $slider2 = Setting::where('subject', 'content-slider-2')->first();
        $slider3 = Setting::where('subject', 'content-slider-3')->first();


        return view('user.home', compact('categories', 'subcategories', 'dayDeals', 'cart'
        , 'randomProducts', 'offer1', 'offer2', 'slider1', 'slider2', 'slider3'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();
        $brands = Brand::all();
        $randomProducts = Product::inRandomOrder()->take(6)->get();


        $cart = $this->getUserCart();


        if ($request->has('subcategory')) {
            $subcategoryName = urldecode($request->query('subcategory'));
            $subcategory = SubCategory::where('name', $subcategoryName)->first();
            if ($subcategory) {
                $products->where('subcategory_id', $subcategory->id);
            }
        }

        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->query('min_price');
            $maxPrice = $request->query('max_price');

            $products->whereBetween('price', [$minPrice, $maxPrice]);
        }

        if($request->has('brand')){
            $brand_id = urldecode($request->query('brand'));
            $brand = Brand::findOrFail($brand_id);
            if($brand){
                $products->where('brand_id', $brand_id);
            }
        }

        if($request->has('category')){
            $categoryId = urldecode($request->query('category'));
            if($categoryId){
                $products->where('category_id', $categoryId);
            }
        }

        if ($request->has('name')) {
            $productName = urldecode($request->query('name'));
            if ($productName) {
                $products->where('name', 'like', '%' . $productName . '%');
            }
        }

        $perPage = $request->input('per_page', 12);
        $products = $products->paginate($perPage);

        return view('user.products', compact('categories', 'products', 'subcategories', 'brands', 'cart', 'randomProducts'));
    }


    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);
        $randomProducts = Product::inRandomOrder()->take(6)->get();


        $cart = $this->getUserCart();

        return view('user.product', compact('categories', 'product', 'subcategories', 'cart', 'randomProducts'));
    }


    public function getUserCart(){
        $cart = null;
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->first();
        }else{
            $cart = Cart::where('session_id', $this->session_id)->first();
        }
        return $cart;
    }

    public function orders(){
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->latest()->get();
        $randomProducts = Product::inRandomOrder()->take(6)->get();


        $cart = $this->getUserCart();
        $categories = Category::all();

        return view('user.orders.index', compact('orders', 'cart', 'categories', 'randomProducts'));
    }
}
