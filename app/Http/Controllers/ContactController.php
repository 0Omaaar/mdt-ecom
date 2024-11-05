<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use App\Mail\NotificationMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();
        $brands = Brand::all();
        $randomProducts = Product::inRandomOrder()->take(6)->get();
        return view('user.contact', compact( 'categories','subcategories','products','brands','randomProducts'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $request->validate([
                'name' => 'string|max:255',
                'email' => 'email',
                'subject' => 'string|max:255',
                'message' => 'string|max:1000',
            ]);

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();

            $notification = new Notification();
            $notification->subject = 'new-contact';
            $notification->content = 'Nouveau Message, Veuillez vérifier la barre de Notifications !';
            $notification->subject_id = $contact->id;
            $notification->save();

            event(new NewOrder($contact->id));

            Mail::to($request->email)->queue(new NotificationMail('notification-contact', $request->email, 'Nouveau Message'));

            DB::commit();

            return redirect()->back()->with('success', 'Votre Message est envoyé avec succès, merci !');
        }catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors d ajout de votre Message !');
        }
    }
}
