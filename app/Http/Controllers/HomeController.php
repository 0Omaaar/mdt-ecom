<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('user.home', compact('categories'));
    }

    public function products(){
        $categories = Category::all();
        $products = Product::all();

        return view('user.products', compact('categories', 'products'));
    }

    public function product($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('user.product', compact('categories', 'product'));
    }
}
