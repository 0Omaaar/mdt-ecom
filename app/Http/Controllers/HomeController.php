<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('user.home', compact('categories'));
    }

    public function products(){
        $categories = Category::all();

        return view('user.products', compact('categories'));
    }

    public function product(){
        $categories = Category::all();

        return view('user.product', compact('categories'));
    }
}
