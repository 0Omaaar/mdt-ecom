<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }

    public function createOrder(Request $request){
        try{
            DB::beginTransaction();
            $count = 0;


            $cart = $this->getUserCart();
            if($cart){
                $order = new Order();
                if(Auth::check()){
                    $order->user_id = Auth::user()->id;
                }else{
                    $order->session_id = $this->session_id;
                }
                if($request->shipping_method == 'transport'){
                    $order->total_price = $cart->total_price + 50;
                }else{
                    $order->total_price = $cart->total_price;
                }
                $order->shipping_method = $request->shipping_method;
                $order->payment_method = $request->payment_method;
                $order->prenom = $request->prenom;
                $order->nom = $request->nom;
                $order->adresse = $request->adresse;
                $order->ville = $request->ville;
                $order->cin = $request->cin;
                $order->phone = $request->phone;
                $order->email = $request->email;
                if($request->shipping_method == 'transport'){
                    $order->shipping_cost = 50;
                }
                $order->note = $request->note;

                $order->save();

                //order items
                if($cart->items()->count() > 0){
                    foreach($cart->items as $item){
                        $orderItem = new OrderItem();
                        $orderItem->order_id = $order->id;
                        $orderItem->product_id = $item->product_id;
                        $orderItem->quantity = $item->quantity;
                        $orderItem->price = $item->price;

                        $orderItem->save();

                        $count++;
                    }
                }

                $cart->delete();

                //ask if i need to change product quantity here or when the order is validated by admin

            }else{
                return redirect()->back()->with('error', 'Une erreur s\'est produite: Panier introuvable');
            }

            DB::commit();
            return redirect()->route('order.completed');
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



    //admin functions

    public function getOrders(){
        $orders = Order::latest()->get();

        return view('admin.orders.all-orders.index', compact('orders'));
    }

    public function showOrder($id){
        $order = Order::findOrFail($id);

        return view('admin.orders.all-orders.show', compact('order'));
    }

    public function validate($id){
        try{
            DB::beginTransaction();
            $order = Order::findOrFail($id);
            if($order->status != 'validée'){
                $order->status = 'validée';
                $order->save();

                foreach($order->items as $item){
                    $product = Product::findOrFail($item->product_id);

                    if ($product->quantity < $item->quantity) {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Quantité insuffisante pour le produit : ' . $product->name);
                    }

                    $product->quantity -= $item->quantity;
                    $product->save();
                }

            DB::commit();
            return redirect()->back()->with('success', 'Commande marquée Validée !');

            }

            return redirect()->back()->with('error', 'Commande Déjà Validée !');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function cancel($id)
    {
        try {
            DB::beginTransaction();

            $order = Order::findOrFail($id);

            if ($order->status == 'annulée') {
                return redirect()->back()->with('error', 'Commande déjà annulée !');
            }

            $order->status = 'annulée';
            $order->save();

            foreach ($order->items as $item) {
                $product = Product::findOrFail($item->product_id);
                $product->quantity += $item->quantity;
                $product->save();
            }

            DB::commit();
            return redirect()->back()->with('success', 'Commande marquée comme annulée et les quantités de produits ont été restaurées !');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }


    public function delete($id){
        try{
            $order = Order::findOrFail($id);
            if($order->status != 'validée'){
                $order->delete();

                return redirect()->back()->with('success', 'Commande supprimée avec succès !');
            }

            return redirect()->back()->with('error', 'Une commande validée ne peut pas être supprimée !');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }
}
