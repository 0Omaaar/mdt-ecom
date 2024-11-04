<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{

    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }

    public function index(){
        $categories = Category::all();
        $cart = $this->getUserCart();
        $randomProducts = Product::inRandomOrder()->take(6)->get();


        return view('user.cart.cart', compact('categories', 'cart', 'randomProducts'));
    }

    public function addToCart(Request $request, $id){
        try {
            $validatedData = $request->validate([
                'quantity' => ['required', 'integer', 'min:1'],
            ]);

            $product = Product::find($id);

            if (!$product) {
                return redirect()->back()->with('error', 'Produit Introuvable.');
            }

            if ($product->quantity < $request->quantity) {
                return redirect()->back()->with('error', 'Quantité du produit insuffisante !');
            }


                if(Auth::check()){
                    $cart = Cart::firstOrCreate([
                        'user_id' => Auth::user()->id
                    ]);
                }else{
                    $cart = Cart::firstOrCreate([
                        'session_id' => $this->session_id
                    ]);
                }

                $cartItem = CartItem::updateOrCreate(
                    ['cart_id' => $cart->id, 'product_id' => $product->id],
                    ['price' => $product->price]
                );

                $cartItem->quantity += $request->quantity;
                $cartItem->save();

                $newPrice = $product->price * $request->quantity;

                $cart->total_price += $newPrice;
                $cart->save();

                return redirect()->back()->with('success', 'Produit ajouté au panier.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function removeItemFromCart($id){
        try{
            $cartItem = CartItem::findOrFail($id);
            if($cartItem){
                $cartItemPrice = $cartItem->quantity * $cartItem->product->price;
                $cart = Cart::findOrFail($cartItem->cart_id);
                if($cart){
                    $cart->total_price = max(0, $cart->total_price - $cartItemPrice);
                    $cart->save();
                }

                $cartItem->delete();

                if ($cart->items()->count() === 0) {
                    $cart->delete();
                }

                return redirect()->back()->with('success', 'Article supprimé du panier.');
            }
            return redirect()->back()->with('error', 'Une erreur s\'est produite');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function addQuantity($id){
        DB::beginTransaction();
        try{
            $cartItem = CartItem::findOrFail($id);
            if ($cartItem->quantity < $cartItem->product->quantity) {

                $cartItem->quantity++;
                $cartItem->save();

                $cart = Cart::findOrFail($cartItem->cart_id);
                $cart->total_price += $cartItem->product->price;
                $cart->save();

                DB::commit();
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Quantité maximum atteinte pour ce produit.');
            }
         }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function decreaseQuantity($id){
        DB::beginTransaction();
        try{
            $cartItem = CartItem::findOrFail($id);
            if($cartItem->quantity > 1){

                $cartItem->quantity--;
                $cartItem->save();

                $cart = Cart::findOrFail($cartItem->cart_id);
                $cart->total_price -= $cartItem->product->price;
                $cart->save();

                DB::commit();
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Quantité minimale atteinte pour ce produit.');
            }
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
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
