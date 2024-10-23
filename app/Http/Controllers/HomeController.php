<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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

        return view('user.home', compact('categories', 'subcategories', 'dayDeals', 'cart'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();
        $brands = Brand::all();

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

        return view('user.products', compact('categories', 'products', 'subcategories', 'brands', 'cart'));
    }


    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);

        $cart = $this->getUserCart();

        return view('user.product', compact('categories', 'product', 'subcategories', 'cart'));
    }


    public function getUserCart(){
        $cart = null;
        if(Auth::check()){
            //check if the authenticated user has some products on session
            dd("Still working on sessions");
        }else{
            $cart = Cart::where('session_id', $this->session_id)->first();
        }
        return $cart;
    }
}
