<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ManageContentController extends Controller
{
    public function index (){
        return view('admin.manage_content.index');
    }

    public function sliders(){

        return view('admin.manage_content.sliders.sliders');
    }

    public function offer1(){

        return view('admin.manage_content.offers.offer1');
    }

    public function offer2(){

        return view('admin.manage_content.offers.offer2');
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
