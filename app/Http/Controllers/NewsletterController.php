<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Newsletter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::latest()->get();
        $products = Product::all();

        return view('admin.newsletters.index', compact('newsletters', 'products'));
    }


    public function store(Request $request)
    {
        try {
            $newsletter = new Newsletter();
            $newsletter->email = $request->email;
            $newsletter->save();

            return redirect()->back()->with('success', 'Votre Email est enregistré avec succès, merci !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors d\'ajout de votre email !');
        }
    }

    public function sendMail(Request $request)
    {
        try {
            $product = Product::findOrFail($request->product_id);
            if ($product) {
                $productData = [
                    'productName' => $product->name,
                    'productImage' => public_path('images/products/' . $product->id . '/' . $product->image),
                    'productDescription' => $product->brief_description,
                    'productPrice' => $product->price,
                    'messageContent' => $request->message,
                    'productUrl' => 'https://mobidigitech.ma/public/product/' . $product->id,
                ];

                $emailArray = explode(',', $request->emails);
                $emailArray = array_map('trim', $emailArray);

                foreach ($emailArray as $email) {
                    // Mail::to($email)->send(new ProductEmail($productData));
                    Mail::to($email)->queue(new NewsletterMail($productData));
                }

                return redirect()->back()->with('success', 'Emails envoyé avec succès');
            }
            return redirect()->back()->with('error', 'Une erreur est survenue !');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $newsletter = Newsletter::findOrfail($id);
            $newsletter->delete();

            return redirect()->back()->with('success', 'Email supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de suppression d\'email !');
        }
    }
}
