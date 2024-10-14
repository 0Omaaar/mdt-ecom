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

        // Handle subcategory filter
        if ($request->has('subcategory')) {
            $subcategoryName = urldecode($request->query('subcategory'));
            $subcategory = SubCategory::where('name', $subcategoryName)->first();
            if ($subcategory) {
                $products->where('subcategory_id', $subcategory->id);
            }
        }

        // Handle price filter
        if ($request->has('min_price') && $request->has('max_price')) {
            // dd("here");
            $minPrice = $request->query('min_price');
            $maxPrice = $request->query('max_price');

            // dd($minPrice, $maxPrice);
            // Apply the price filter if values are set
            // if (!empty($minPrice) && !empty($maxPrice)) {
            //     dd("here");
                $products->whereBetween('price', [$minPrice, $maxPrice]);

                // dd($products);
            // }
        }

        // Execute the query to get the filtered products
        $products = $products->get();

        return view('user.products', compact('categories', 'products', 'subcategories'));
    }


    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);

        return view('user.product', compact('categories', 'product', 'subcategories'));
    }

}
