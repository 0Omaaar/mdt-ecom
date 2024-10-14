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

    public function products(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::all();

        return view('user.products', compact('categories', 'products', 'subcategories'));
    }

    public function product($id){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::findOrFail($id);

        return view('user.product', compact('categories', 'product', 'subcategories'));
    }
}
