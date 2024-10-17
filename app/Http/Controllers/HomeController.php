<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $dayDeals = Product::where('dayDeals', true)->get();


        return view('user.home', compact('categories', 'subcategories', 'dayDeals'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();
        $brands = Brand::all();

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

        return view('user.products', compact('categories', 'products', 'subcategories', 'brands'));
    }


    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);

        return view('user.product', compact('categories', 'product', 'subcategories'));
    }

}
