<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = SubCategory::all();


        return view('user.home', compact('categories', 'subcategories'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();

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

        $perPage = $request->input('per_page', 12);
        $products = $products->paginate($perPage);

        return view('user.products', compact('categories', 'products', 'subcategories'));
    }


    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);

        return view('user.product', compact('categories', 'product', 'subcategories'));
    }

}
