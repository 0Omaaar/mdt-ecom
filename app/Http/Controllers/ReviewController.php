<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request, $id){
        try{
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            ]);

            $review = new Review();
            $review->name = $request->name;
            $review->email = $request->email;
            $review->subject = $request->subject;
            $review->message = $request->message;

            $product = Product::findOrFail($id);
            $review->product_id = $product->id;

            $review->save();

            return redirect()->back()->with('success', 'Votre Avis est envoyé avec succès, merci !');
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors d ajout de votre avis !');
        }
    }
}
