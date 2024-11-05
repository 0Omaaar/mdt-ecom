<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ManageContentController extends Controller
{
    public function index (){
        return view('admin.manage_content.index');
    }

    public function sliders(){
        $products = Product::all();
        $slider1Setting = Setting::where('subject', 'content-slider-1')->first();
        $slider2Setting = Setting::where('subject', 'content-slider-2')->first();
        $slider3Setting = Setting::where('subject', 'content-slider-3')->first();

        return view('admin.manage_content.sliders.sliders', compact('products', 'slider1Setting', 'slider2Setting', 'slider3Setting'));
    }

    public function uploadSliderDetails(Request $request, $id){
        try{
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:255',
                'button_name' => 'nullable|string|max:100',
            ]);

            $oldSetting = Setting::where('subject', 'content-slider-'.$id)->first();

            if($oldSetting){
                $oldSetting->delete();
            }

            $setting = new Setting();
            $setting->subject = 'content-slider-'.$id;
            $setting->content = $request->product_id;
            $setting->optional_content_1 = $request->title;
            $setting->optional_content_2 = $request->description;
            $setting->optional_content_3 = $request->button_name;
            $setting->save();

            return redirect()->back()->with('success', 'Détails Ajoutés avec succès');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors d\'ajout des détails !');
        }
    }

    public function offer1(){
        $products = Product::all();

        return view('admin.manage_content.offers.offer1', compact('products'));
    }

    public function uploadPathProductOffer1(Request $request){
        try{
            $oldSetting = Setting::where('subject', 'offre1-produit-id')->first();
            if($oldSetting){
                $oldSetting->delete();
            }
            $setting = new Setting();
            $setting->subject = 'offre1-produit-id';
            $setting->content = $request->product_id;
            $setting->save();

            return redirect()->back()->with('success', 'Chemin Produit Affecté avec succès');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors d\'affectation du produit !');
        }
    }

    public function offer2(){
        $products = Product::all();

        return view('admin.manage_content.offers.offer2', compact('products'));
    }

    public function uploadPathProductOffer2(Request $request){
        try{
            $oldSetting = Setting::where('subject', 'offre2-produit-id')->first();
            if($oldSetting){
                $oldSetting->delete();
            }
            $setting = new Setting();
            $setting->subject = 'offre2-produit-id';
            $setting->content = $request->product_id;
            $setting->save();

            return redirect()->back()->with('success', 'Chemin Produit Affecté avec succès');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Une erreur est survenue lors d\'affectation du produit !');
        }
    }

    public function dayDealsProducts(){
        $products = Product::where('dayDeals', true)->get();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();

        return view('admin.manage_content.dayDeals.index', compact('products', 'categories', 'subCategories', 'brands'));
    }


    public function uploadOffre1(Request $request){
        if ($request->hasFile('offre1')) {
            $imageName = "img_02.jpg";
            $request->file('offre1')->move(public_path('assets/user/images/offer/electronic/'), $imageName);
        }
    }

    public function deleteOffre1(){
        if(File::exists(public_path('assets/user/images/offer/electronic/img_02.jpg'))){
            File::delete(public_path('assets/user/images/offer/electronic/img_02.jpg'));
        }
    }

    public function uploadOffre2(Request $request){
        if ($request->hasFile('offre2')) {
            $imageName = "img_03.jpg";
            $request->file('offre2')->move(public_path('assets/user/images/offer/electronic/'), $imageName);
        }
    }

    public function deleteOffre2(){
        if(File::exists(public_path('assets/user/images/offer/electronic/img_03.jpg'))){
            File::delete(public_path('assets/user/images/offer/electronic/img_03.jpg'));
        }
    }
    public function uploadS1(Request $request){
        if ($request->hasFile('slider1')) {
            $imageName = "img_01.png";
            $request->file('slider1')->move(public_path('assets/user/images/slider/electronic/'), $imageName);
        }
    }

    public function deleteS1()
    {
        if(File::exists(public_path('assets/user/images/slider/electronic/img_01.png'))){
            File::delete(public_path('assets/user/images/slider/electronic/img_01.png'));
        }
    }

    public function uploadS2(Request $request){
        if ($request->hasFile('slider2')) {
            $imageName = "img_02.png";
            $request->file('slider2')->move(public_path('assets/user/images/slider/electronic/'), $imageName);
        }
    }

    public function deleteS2()
    {
        if(File::exists(public_path('assets/user/images/slider/electronic/img_02.png'))){
            File::delete(public_path('assets/user/images/slider/electronic/img_02.png'));
        }
    }

    public function uploadS3(Request $request){
        if ($request->hasFile('slider3')) {
            $imageName = "img_03.png";
            $request->file('slider3')->move(public_path('assets/user/images/slider/electronic/'), $imageName);
        }
    }

    public function deleteS3()
    {
        if(File::exists(public_path('assets/user/images/slider/electronic/img_03.png'))){
            File::delete(public_path('assets/user/images/slider/electronic/img_03.png'));
        }
    }
}
