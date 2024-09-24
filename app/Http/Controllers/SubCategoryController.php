<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class SubCategoryController extends Controller
{
    public function index(){
        $subCategories = SubCategory::all();
        $categories = Category::all();

        return view('admin.subCategories.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/subCategories'), $imageName);
            }else{
                $imageName = null;
            }

            $subCategory = new SubCategory();
            $subCategory->name = $validatedData['name'];
            $subCategory->category_id = $request->category_id;
            $subCategory->image = $imageName;

            $subCategory->save();

            return redirect()->route('admin.subCategories.index')->with('success', 'Categorie ajoutée avec succès');
        }catch(\Exception $e){
            dd($e);
            return redirect()->route('admin.subCategories.index')->with('error', 'Une Erreur est survenue lors de l\'ajout de la catégorie.');
        }
    }

    public function update(Request $request, $id){
        return $id;
    }

}
