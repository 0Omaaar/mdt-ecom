<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
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

            if (!Auth::check()) {
                $cart = Cart::firstOrCreate([
                    'session_id' => $this->session_id
                ]);

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
            } else {
                dd("Still working on sessions process");
            }
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

}
