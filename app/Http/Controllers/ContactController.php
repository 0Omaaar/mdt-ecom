<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use App\Mail\ContactMail;
use App\Mail\NotificationMail;
use App\Mail\ReviewMail;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class ContactController extends Controller
{
    public $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }


    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::query();
        $brands = Brand::all();
        $randomProducts = Product::inRandomOrder()->take(6)->get();
        $cart = $this->getUserCart();


        return view('user.contact', compact(
            'categories',
            'subcategories',
            'products',
            'brands',
            'randomProducts',
            'cart'
        ));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $recaptchaResponse = $request->input('g-recaptcha-response');
            if (is_null($recaptchaResponse)) {
                return redirect()->back()->with('error', 'Please complete the reCAPTCHA.');
            }

            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret'),
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ]);

            $result = $response->json();
            if (!$result['success']) {
                return back()->with('error', 'reCAPTCHA validation failed.');
            }


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
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Une erreur est survenue lors d\'ajout de votre Message !');
        }
    }


    // admin functions

    public function admin_index()
    {
        $contacts = Contact::latest()->get();

        return view('admin.contact.index', compact('contacts'));
    }

    public function answerContactWithMail(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        Mail::to($contact->email)->queue(new ContactMail($contact, $request->response));

        $contact->status = 'Traité';
        $contact->save();

        return redirect()->back()->with('success', 'Votre Réponse est envoyée avec succès');
    }

    public function destroy($id)
    {
        try {
            $contact = Contact::findOrfail($id);
            $contact->delete();

            return redirect()->back()->with('success', 'Message supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de suppression de message !');
        }
    }

    public function getUserCart()
    {
        $cart = null;
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
        } else {
            $cart = Cart::where('session_id', $this->session_id)->first();
        }
        return $cart;
    }
}
