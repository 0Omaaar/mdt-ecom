<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }


    public function checkoutPage(){
        $cart = $this->getUserCart();
        $categories = Category::all();

        return view('user.cart.checkout', compact('cart', 'categories'));
    }

    public function orderCompleted(){
        $cart = $this->getUserCart();
        $categories = Category::all();

        return view('user.cart.orderCompleted', compact('cart', 'categories'));
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
}
