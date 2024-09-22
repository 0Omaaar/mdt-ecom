<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:categories,slug',
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/categories'), $imageName);
            }else{
                $imageName = null;
            }


            $category = new Category();
            $category->name = $validatedData['name'];
            $category->slug = $validatedData['slug'];
            $category->image = $imageName;

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', 'Categorie ajoutée avec succès');
        }catch(\Exception $e){
            dd($e);
            return redirect()->route('admin.categories.index')->with('error', 'Une Erreur est survenue lors de l\'ajout de la catégorie.');
        }
    }
}
