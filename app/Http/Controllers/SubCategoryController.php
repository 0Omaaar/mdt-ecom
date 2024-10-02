<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;


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
        try{
            $subCategory = SubCategory::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                if($subCategory->image && File::exists(public_path('images/subCategories/'.$subCategory->image))){
                    File::delete(public_path('images/subCategories/'.$subCategory->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/subCategories'), $imageName);
                $subCategory->image = $imageName;
            }

            $subCategory->name = $validatedData['name'];
            $subCategory->category_id = $request->category_id;

            $subCategory->save();

            return redirect()->route('admin.subCategories.index')->with('success', 'Sous Categorie mise à jour avec succès');
        }catch(\Exception $e){
            return redirect()->route('admin.subCategories.index')->with('error', 'Une Erreur est survenue lors de la mise à jour de la sous catégorie.');
        }
    }


    public function destroy($id){
        try {
            $subCategory = SubCategory::findOrFail($id);

            if ($subCategory->image && File::exists(public_path('images/subCategories/' . $subCategory->image))) {
                File::delete(public_path('images/subCategories/' . $subCategory->image));
            }

            $subCategory->delete();

            return redirect()->route('admin.subCategories.index')->with('success', 'Sous Categorie supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('admin.subCategories.index')->with('error', 'Une Erreur est survenue lors de la suppression de la sous catégorie.');
        }
    }

}
