<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();

        return view('admin.brands.index', compact('brands'));
    }

    public function store(Request $request){
        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/brands'), $imageName);
            }

            $brand = new Brand();
            $brand->name = $validatedData['name'];
            $brand->image = $imageName;

            $brand->save();

            return redirect()->route('admin.brands.index')->with('success', 'Marque ajoutée avec succès');
        }catch(\Exception $e){
            return redirect()->route('admin.brands.index')->with('error', 'Une Erreur est survenue lors de l\'ajout de la marque.');
        }
    }

    public function update(Request $request, $id){
        try{
            $brand = Brand::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string',
                'image' => 'nullable|image|max:3000'
            ]);

            if($request->hasFile('image')){
                if($brand->image && File::exists(public_path('images/brands/'.$brand->image))){
                    File::delete(public_path('images/brands/'.$brand->image));
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/brands'), $imageName);
                $brand->image = $imageName;
            }

            $brand->name = $validatedData['name'];

            $brand->save();

            return redirect()->route('admin.brands.index')->with('success', 'Marque mise à jour avec succès');
        }catch(\Exception $e){
            return redirect()->route('admin.brands.index')->with('error', 'Une Erreur est survenue lors de la mise à jour de la marque.');
        }
    }


    public function destroy($id){
        try {
            $brand = Brand::findOrFail($id);

            if ($brand->image && File::exists(public_path('images/brands/' . $brand->image))) {
                File::delete(public_path('images/brands/' . $brand->image));
            }

            $brand->delete();

            return redirect()->route('admin.brands.index')->with('success', 'Marque supprimée avec succès');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('admin.brands.index')->with('error', 'Une Erreur est survenue lors de la suppression de la marque.');
        }
    }
}
