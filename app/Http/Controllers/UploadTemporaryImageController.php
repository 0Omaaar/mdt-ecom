<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImage;
use App\Models\Image;


class UploadTemporaryImageController extends Controller
{

    public function upload(Request $request){

        // $folder = uniqid('image-', true);

        if($request->hasFile('image')){
            $folder = uniqid('image-', true);

            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('images/tmp/'.$folder), $imageName);

            TemporaryImage::create([
                'folder' => $folder,
                'file' => $imageName,
                'miniature' => 1
            ]);

        }
        if($request->hasFile('images')){
            $folder = uniqid('image-', true);

            foreach($request->file('images') as $image){
                $imageName = uniqid() . '.' . $image->extension();
                $image->move(public_path('images/tmp/'.$folder), $imageName);

                TemporaryImage::create([
                    'folder' => $folder,
                    'file' => $imageName
                ]);
            }
        }
        return $folder;
    }
}
