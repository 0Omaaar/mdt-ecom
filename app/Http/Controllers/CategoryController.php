<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;



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

    public function update(Request $request, $id){
        try{
            $category = Category::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string',
                'slug' => 'required|string|unique:categories,slug,'.$id,
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                if($category->image && File::exists(public_path('images/categories/'.$category->image))){
                    File::delete(public_path('images/categories/'.$category->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/categories'), $imageName);
                $category->image = $imageName;
            }

            $category->name = $validatedData['name'];
            $category->slug = $validatedData['slug'];

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', 'Categorie mise à jour avec succès');
        }catch(\Exception $e){
            return redirect()->route('admin.categories.index')->with('error', 'Une Erreur est survenue lors de la mise à jour de la catégorie.');
        }
    }


    public function destroy($id){
        try {
            $category = Category::findOrFail($id);

            if ($category->image && File::exists(public_path('images/categories/' . $category->image))) {
                File::delete(public_path('images/categories/' . $category->image));
            }

            $category->delete();

            return redirect()->route('admin.categories.index')->with('success', 'Categorie supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')->with('error', 'Une Erreur est survenue lors de la suppression de la catégorie.');
        }
    }
}
