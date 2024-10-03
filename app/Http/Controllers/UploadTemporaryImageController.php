<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;


class UploadTemporaryImageController extends Controller
{

    public function upload(Request $request){
        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();
            $folder = uniqid('image-', true);
            $request->image->move(public_path('images/tmp/'.$folder), $imageName);

            TemporaryImage::create([
                'folder' => $folder,
                'file' => $imageName
            ]);

            return $folder;
        }
        return '';
    }
}
