<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\File;

class DeleteTemporaryImageController extends Controller
{

    public function delete(Request $request)
    {
        $folder = $request->getContent();

        $temporaryImage = TemporaryImage::where('folder', $folder)->first();

        if($temporaryImage){
            $imagePath = public_path('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file);

            if(File::exists($imagePath)){
                File::delete($imagePath);
            }

            $folderPath = public_path('images/tmp/' . $temporaryImage->folder);
            if(File::isDirectory($folderPath) && File::isEmptyDirectory($folderPath)){
                File::deleteDirectory($folderPath);
            }

            $temporaryImage->delete();

            return response()->json(['message' => 'Image deleted successfully']);
        }

        return response()->json(['error' => 'Image not found'], 404);
    }
}
