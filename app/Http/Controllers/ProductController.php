<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\TemporaryImage;
use App\Models\Image;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function show($id){
        try{
            $product = Product::findOrFail($id);

            return view('admin.products.show', compact('product'));
        }catch(\Exception $e){
            return redirect()->route('admin.products.index');
        }
    }

    public function create(){
        $subCategories = SubCategory::all();

        return view('admin.products.create', compact('subCategories'));
    }

    public function store(Request $request){

        // dd($request->all);

       try{
            $request->validate([
                'name' => 'required|string|max:255',
                'brief_description' => 'nullable|string|max:255',
                'description' => 'required',
                'price' => 'required|numeric|min:0',
                'old_price' => 'nullable|numeric|min:0',
                'sku' => 'required|string|max:255',
                'stock_status' => 'required|in:instock,outstock',
                'quantity' => 'required|integer|min:0',
            ]);

            $product = new Product();
            $product->name = $request->input('name');
            $product->brief_description = $request->input('brief_description');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->old_price = $request->input('old_price');
            $product->sku = $request->input('sku');
            $product->stock_status = $request->input('stock_status');
            $product->quantity = $request->input('quantity');
            $product->subcategory_id = $request->input('subcategory_id');

            $subCategory = SubCategory::findOrFail($product->subcategory_id);
            $product->category_id = $subCategory->category->id;
            $product->image = 'n';

            $product->save();

            $temporaryImages = TemporaryImage::all();

            foreach($temporaryImages as $temporaryImage){
                $imagePath = public_path('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file);

                $newFolderPath = public_path('images/products/' . $product->id);

                if (!File::exists($newFolderPath)) {
                    File::makeDirectory($newFolderPath, 0755, true);
                }

                $newImagePath = $newFolderPath . '/' . $temporaryImage->file;

                if(File::exists($imagePath)){
                    File::copy($imagePath, $newImagePath);
                    File::delete($imagePath);
                }

                if($temporaryImage->miniature == 1){
                    $product->image = $temporaryImage->file;
                }else{
                    $image = new Image();
                    $image->path = $temporaryImage->file;
                    $image->product_id = $product->id;
                    $image->save();
                }

                $folderPath = public_path('images/tmp/' . $temporaryImage->folder);
                if(File::isDirectory($folderPath) && File::isEmptyDirectory($folderPath)){
                    File::deleteDirectory($folderPath);
                }

                $temporaryImage->delete();
            }

            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès');
        }catch(\Exception $e){
            return $e->getMessage();
            // return redirect()->route('admin.products.index')->with('error', 'Une Erreur est survenue lors de l\'ajout de produit.');
        }
    }
}
